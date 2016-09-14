<?php
class Update_1 extends Update_Core {
  
  public function execute() {
    $qs = [
      "CREATE TABLE IF NOT EXISTS `category` (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(64) NOT NULL,
        `status` tinyint(1) NOT NULL DEFAULT '1',
        `created` int(10) unsigned NOT NULL DEFAULT '0',
        `updated` int(10) unsigned NOT NULL DEFAULT '0',
        PRIMARY KEY (`id`),
        KEY `status` (`status`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;",
    ];
    return $this->dbQueries($qs);
  }
  
}