<?php
class Update_2 extends Update_Core {
  
  public function execute() {
    $qs = [
      "CREATE TABLE IF NOT EXISTS `post` (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `title` VARCHAR(64) NOT NULL,
        `user_id` INT(10) unsigned NOT NULL,
        `category_id` INT(10) unsigned NULL,
        `content` TEXT NULL,
        `image_id` INT unsigned NULL,
        `status` tinyint(1) NOT NULL DEFAULT '1',
        `created` int(10) unsigned NOT NULL DEFAULT '0',
        `updated` int(10) unsigned NOT NULL DEFAULT '0',
        PRIMARY KEY (`id`),
        KEY `status` (`status`),
        KEY `user_id` (`user_id`),
        KEY `category_id` (`category_id`),
        KEY `image_id` (`image_id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;",
      "ALTER TABLE `post`
        ADD FOREIGN KEY (`image_id`) REFERENCES `file`(`id`) ON DELETE SET NULL ON UPDATE SET NULL;",
    ];
    return $this->dbQueries($qs);
  }
  
}