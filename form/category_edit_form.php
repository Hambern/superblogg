<?php
class CategoryEdit_Form extends Form {
  
  protected function structure() {
    $Category = $this->get("Category");
    $form = [
      "name" => "category_edit",
      "items" => [
        "actions" => $this->defaultActions(),
      ],
    ];
    return $form;
  }
  
}