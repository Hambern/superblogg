<?php
/**
 * Contains the page controller
 */
/**
 * Page controller
 *
 * Used for custom pages, such as the front page
 * @author Eric Höglander
 */
class Page_Controller extends Page_Controller_Core {

  /**
   * The front page
   * @return string
   */
  public function indexAction() {
    $Post = $this->getModel("Post");
    $Pager = newClass("Pager");
    $Pager->ppp = 4;
    if (!empty($_GET["search"]))
      $this->viewData["search"] = $values["search"] = $_GET["search"];
    $Pager->setNum($Post->searchNum($values));
    $values["limit"] = [$Pager->start(), $Pager->ppp];
    $this->viewData["posts"] = $Post->search($values);
    $this->viewData["pager"] = $Pager->render();
    $this->viewData["categories"] = $this->getModel("Category")->search();
    $this->viewData["post_search"] = $this->getForm("PostSearch")->render();
    return $this->view("index");
  }

};
