<?php
class Category_Model extends Model {
  
  public function addCategory($values) {
    return $this->editCategory($this->getEntity("Category"), $values);
  }
  
  public function editCategory($Category, $values) {
    foreach ($values as $key => $value) {
      if (!is_array($value))
        $Category->set($key, $value);
    }
    $Category->save();
  }
  
  public function deleteCategory($Category) {
    $Category->delete();
  }
  
  public function listSearchQuery($values) {
    $query = [
      "from" => "category",
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
    return $this->getEntities("Category", $this->Db->getRows($this->listSearchQuery($values)));
  }
  
}