<?php
class Category_Entity extends Entity {

  protected function schema() {
    $schema = parent::schema();
    $schema["table"] = "category";
    $schema["fields"]+= [
      "name" => [
        "type" => "varchar",
        "length" => 64,
      ],
    ];
    return $schema;
  }
  
}
