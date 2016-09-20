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

  public function searchQuery($values = []) {
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

  public function searchNum($values) {
    return $this->Db->numRows($this->searchQuery($values));
  }

  public function search($values = array()) {
    return $this->getEntities("Category", $this->Db->getRows($this->searchQuery($values)));
  }

  public function getPaginatedList($per_page, $values = array()) {
    $Pager = newClass("Pager");
    $Pager->ppp = $per_page;
    $Pager->setNum($this->searchNum($values));
    $values["limit"] = [$Pager->start(), $Pager->ppp];
    return [
      "pager" => $Pager->render(),
      "list" => $this->search($values),
    ];
  }

}
