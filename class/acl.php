<?php
class Acl extends Acl_Core {

  protected function categoryAdminAccess($User) {
    return $User->id() == 1;
  }

  protected function postAdminAccess($User) {
    return $User->id() == 1;
  }

  protected function postsViewAccess($User) {
    return true;
  }

}
