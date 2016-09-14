<?php
class Category_Controller extends Controller {
  
  public function acl($action, $args = []) {
    return ["categoryAdmin"];
  }
  
  public function addAction() {
    $Form = $this->getForm("CategoryEdit");
    if ($Form->isSubmitted()) {
      try {
        $this->Model->addCategory($Form->values());
        setmsg(t("category added"), "success");
        redirect("category/list");
      }
      catch (Exception $e) {
        setmsg($e->getMessage(), "error");
      }
    }
    $this->viewData["form"] = $Form->render();
    return $this->view("add");
  }
  
  public function editAction($args = []) {
    if (empty($args[0]))
      return $this->notFound();
    $Category = $this->getEntity("Category", $args[0]);
    if (!$Category->id())
      return $this->notFound();
    $Form = $this->getForm("CategoryEdit", ["Category" => $Category]);
    if ($Form->isSubmitted()) {
      try {
        $this->Model->editCategory($Category, $Form->values());
        setmsg(t("category saved"), "success");
        redirect("category/list");
      }
      catch (Exception $e) {
        setmsg($e->getMessage(), "error");
      }
    }
    $this->viewData["form"] = $Form->render();
    return $this->view("edit");
  }
  
  public function deleteAction($args = []) {
    if (empty($args[0]))
      return $this->notFound();
    $Category = $this->getEntity("Category", $args[0]);
    if (!$Category->id())
      return $this->notFound();
    $Form = $this->getForm("Confirm", ["text" => t("Are you sure you want to delete the category?")]);
    if ($Form->isSubmitted()) {
      try {
        $this->Model->deleteCategory($Category);
        setmsg(t("category deleted"), "success");
        redirect("category/list");
      }
      catch (Exception $e) {
        setmsg($e->getMessage(), "error");
      }
    }
    $this->viewData["form"] = $Form->render();
    return $this->view("delete");
  }
  
  public function listAction() {
    $values = (!empty($_SESSION["category_list_search"]) ? $_SESSION["category_list_search"] : []);
    $Form = $this->getForm("Search", $values);
    if ($Form->isSubmitted()) {
      $_SESSION["category_list_search"] = $Form->values();
      redirect("category/list");
    }
    $Pager = newClass("Pager");
    $Pager->ppp = 30;
    $Pager->setNum($this->Model->listSearchNum($values));
    $values["limit"] = [$Pager->start(), $Pager->ppp];
    $this->viewData["search"] = $Form->render();
    $this->viewData["pager"] = $Pager->render();
    $this->viewData["items"] = $this->Model->listSearch($values);
    return $this->view("list");
  }
  
}