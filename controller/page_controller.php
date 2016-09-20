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
    $Pager->ppp = 3;
    $Pager->setNum($Post->searchNum());
    $values["limit"] = [$Pager->start(), $Pager->ppp];
    $this->viewData["Posts"] = $Post->search($values);
    $this->viewData["Pager"] = $Pager->render();
    $this->viewData["Categories"] = $this->getModel("Category")->search();
    return $this->view("index");
  }

};
