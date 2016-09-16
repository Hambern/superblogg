<?php
class Post_Entity extends Entity {

  public function image() {
    return $this->getStoredEntity("File", $this->get("image_id"));
  }

  public function category() {
    return $this->getStoredEntity("Category", $this->get("category_id"));
  }

  public function user() {
    return $this->getStoredEntity("User", $this->get("user_id"));
  }

  protected function schema() {
    $schema = parent::schema();
    $schema["table"] = "post";
    $schema["fields"]+= [
      "title" => [
        "type" => "varchar",
        "length" => 64,
      ],
      "user_id" => [
        "type" => "uint",
        "length" => 10,
      ],
      "category_id" => [
        "type" => "uint",
        "length" => 10,
      ],
      "content" => [
        "type" => "text",
      ],
      "image_id" => [
        "type" => "file",
      ],
    ];
    return $schema;
  }

}
