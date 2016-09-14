<?php
class PostEdit_Form extends Form {
  
  protected function structure() {
    $Post = $this->get("Post");
    $form = [
      "name" => "post_edit",
      "items" => [
        "actions" => $this->defaultActions(),
      ],
    ];
    return $form;
  }
  
}