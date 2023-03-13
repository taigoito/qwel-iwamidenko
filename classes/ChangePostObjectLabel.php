<?php
namespace IwamidenkoRecruit_Theme;

trait ChangePostObjectLabel {
  
  public function change_post_object_label() {
    global $wp_post_types;
    $name    = '採用情報';
    $labels  = &$wp_post_types[ 'post' ]->labels;
    $labels->name                = $name;
    $labels->singular_name       = $name;
    $labels->add_new             = _x( '追加', $name );
    $labels->add_new_item        = $name . 'の新規追加';
    $labels->edit_item           = $name . 'の編集';
    $labels->new_item            = '新規' . $name;
    $labels->view_item           = $name . 'を表示';
    $labels->search_items        = $name . 'を検索';
    $labels->not_found           = $name . 'が見つかりませんでした';
    $labels->not_found_in_trash  = 'ゴミ箱に' . $name . 'は見つかりませんでした';
  }

}
