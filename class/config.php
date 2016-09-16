<?php
/**
 * Default config file
 */

/**
 * Config class
 *
 * Each function returns a specific configuration option
 *
 * @author Eric Höglander
 */
class Config extends Config_Core {

  /**
   * If the site should be in debug mode
   * @return bool
   */
  public function getDebug() {
    return true;
  }

  /**
   * The name of the site
   * @return string
   */
  public function getSiteName() {
    return 'Superbloggen';
  }

  /**
   * The menus for the site
   * @return array An array of menus and links to be rendered
   */
  public function getMenus() {
    $menu = parent::getMenus();
    $admin = [
      "post" => [
        "title" => "Posts",
        "href" => "post/list",
        "links" => [
          "post-add" => [
            "title" => "Add post",
            "href" => "post/add",
          ],
        ],
      ],
      "category" => [
        "title" => "Categories",
        "href" => "category/list",
        "links" => [
          "category-add" => [
            "title" => "Add category",
            "href" => "category/add",
          ],
        ],
      ],
    ];
    array_splice($menu["admin"]["links"], 1, 0, $admin);
		return $menu;
  }

};
