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
    $values = array();
    $Pager = newClass("Pager");
    $Pager->ppp = 3;
    $Pager->setNum($Post->searchNum($values));
    $values["limit"] = [$Pager->start(), $Pager->ppp];
    $this->viewData["Pager"] = $Pager->render();
    $this->viewData["Posts"] = $Post->search($values);
    $this->viewData["Categories"] = $this->getModel("Category")->search();
    return $this->view("index");
  }

};
