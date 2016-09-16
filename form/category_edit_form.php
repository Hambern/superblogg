<?php
class CategoryEdit_Form extends Form {

  protected function structure() {
    $Category = $this->get("Category");
    $form = [
      "name" => "category_edit",
      "items" => [
        "name" => [
          "type" => "text",
          "label" => t("Name"),
          "value" => ($Category ? xss($Category->get("name")) : null),
          "focus" => true,
          "required" => true,
        ],
        "actions" => $this->defaultActions(),
      ],
    ];
    return $form;
  }

}
