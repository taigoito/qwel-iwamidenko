<?php
namespace IwamidenkoRecruit_Theme;

trait ChangePostMenuLabel {
  
  public function change_post_menu_label() {
    global $menu;
    global $submenu;
    $name            = '採用情報';
    $menu[ 5 ][ 0 ]  = $name;
    $submenu[ 'edit.php' ][ 5 ][ 0 ]   = $name . '一覧';
    $submenu[ 'edit.php' ][ 10 ][ 0 ]  = '新規' . $name;
  }

}
