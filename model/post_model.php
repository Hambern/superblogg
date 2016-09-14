<?php
class Post_Model extends Model {
  
  public function addPost($values) {
    return $this->editPost($this->getEntity("Post"), $values);
  }
  
  public function editPost($Post, $values) {
    foreach ($values as $key => $value) {
      if (!is_array($value))
        $Post->set($key, $value);
    }
    $Post->save();
  }
  
  public function deletePost($Post) {
    $Post->delete();
  }
  
  public function listSearchQuery($values) {
    $query = [
      "from" => "post",
      "cols" => ["id"],
    ];
    if (!empty($values["q"])) {
      $qs = explode(" ", $values["q"]);
      foreach ($qs as $i => $q) {
        $key = ":q".$i;
        // $query["where"][] = "title LIKE ".$key;
        // $query["vars"][$key] = $q;
      }
    }
    if (!empty($values["limit"]))
      $query["limit"] = $values["limit"];
    return $query;
  }
  
  public function listSearchNum($values) {
    return $this->Db->numRows($this->listSearchQuery($values));
  }
  
  public function listSearch($values) {
    return $this->getEntities("Post", $this->Db->getRows($this->listSearchQuery($values)));
  }
  
}