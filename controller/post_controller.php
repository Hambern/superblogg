<?php
class Post_Controller extends Controller {

  public function acl($action, $args = []) {
    if ($action == "view")
      return ["postsView"];
    return ["postAdmin"];
  }

  public function viewAction($args = []) {
    if (empty($args[0]))
      return $this->notFound();
    $Post = $this->getEntity("Post", $args[0]);
    if (!$Post->id())
      return $this->notFound();
    $this->viewData["Post"] = $Post;
    $this->viewData["Categories"] = $this->getModel("Category")->search();
    return $this->view("view");
  }

  public function addAction() {
    $Form = $this->getForm("PostEdit");
    if ($Form->isSubmitted()) {
      try {
        $this->Model->addPost($Form->values());
        setmsg(t("Post added"), "success");
        redirect("post/list");
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
    $Post = $this->getEntity("Post", $args[0]);
    if (!$Post->id())
      return $this->notFound();
    $Form = $this->getForm("PostEdit", ["Post" => $Post]);
    if ($Form->isSubmitted()) {
      try {
        $this->Model->editPost($Post, $Form->values());
        setmsg(t("Post saved"), "success");
        redirect("post/list");
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
    $Post = $this->getEntity("Post", $args[0]);
    if (!$Post->id())
      return $this->notFound();
    $Form = $this->getForm("Confirm", ["text" => t("Are you sure you want to delete the post?")]);
    if ($Form->isSubmitted()) {
      try {
        $this->Model->deletePost($Post);
        setmsg(t("Post deleted"), "success");
        redirect("post/list");
      }
      catch (Exception $e) {
        setmsg($e->getMessage(), "error");
      }
    }
    $this->viewData["form"] = $Form->render();
    return $this->view("delete");
  }

  public function listAction() {
    $values = (!empty($_SESSION["post_list_search"]) ? $_SESSION["post_list_search"] : []);
    $Form = $this->getForm("Search", $values);
    if ($Form->isSubmitted()) {
      $_SESSION["post_list_search"] = $Form->values();
      redirect("post/list");
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
