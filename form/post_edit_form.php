<?php
class PostEdit_Form extends Form {

  protected function structure() {
    $Post = $this->get("Post");
    $rows = $this->Db->getRows("SELECT * FROM category ORDER BY name ASC");
    $categories = array();
    foreach ($rows as $row) $categories[$row->id] = $row->name;

    $form = [
      "name" => "post_edit",
      "items" => [
        "image_id" => [
          "type" => "image",
          "label" => t("Image"),
          "value" => ($Post ? $Post->get("image_id") : null),
        ],
        "user_id" => [
          "type" => "value",
          "value" => ($Post ? $Post->get("user_id") : $this->User->get("id")),
        ],
        "title" => [
          "type" => "text",
          "label" => t("Title"),
          "value" => ($Post ? xss($Post->get("title")) : null),
          "focus" => true,
          "required" => true,
        ],
        "content" => [
          "type" => "tinymce",
          "label" => t("Content"),
          "value" => ($Post ? $Post->get("content") : null),
        ],
        "category_id" => [
          "type" => "select",
          "label" => t("Category"),
          "options" => $categories,
          "value" => ($Post ? $Post->get("category_id") : null),
        ],
        "actions" => $this->defaultActions(),
      ],
    ];
    return $form;
  }

}
