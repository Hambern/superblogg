<?php
class Acl extends Acl_Core {

  protected function categoryAdminAccess($User) {
    return $User->id() == 1;
  }
  
}