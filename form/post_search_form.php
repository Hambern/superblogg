<?php
class PostSearch_Form extends Form {

  protected function structure() {
    $search = $_GET["search"];
    return $form = [
      "name" => "post_search",
      "attributes" => [
        "method" => "GET",
      ],
      "action" => BASE_URL,
      "items" => [
        "search" => [
          "type" => "text",
          "attributes" => [
            "placeholder" => t("search"),
            "class" => "u-full-width",
          ],
          "value" => ($search ?: null),
          "autofocus" => ($search ? true : false),
        ],
      ],
    ];
  }

}
