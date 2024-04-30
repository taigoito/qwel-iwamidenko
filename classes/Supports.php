<?php
namespace Iwamidenko_Theme;

trait Supports {
  // テーマサポート機能
  public function setup_theme() {
    // ブロックスタイル, エディターにstyle.css
    add_action( 'after_setup_theme', [ $this, 'support_theme' ] );

		// オブジェクトラベル変更
		add_action( 'init', [ $this, 'change_post_object_label' ] );

		// メニューラベル変更
		add_action( 'admin_menu', [ $this, 'change_post_menu_label' ] );

    // カスタム投稿タイプ, タクソノミーを登録
    add_action( 'init', [ $this, 'register_blog_as_post_type' ] );
  }

  public function support_theme() {
    // ブロックスタイルをサポート
		add_theme_support( 'wp-block-styles' );

		// エディターにstyle.cssをセット
		add_editor_style( 'style.css' );
  }

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

  public function change_post_menu_label() {
    global $menu;
    global $submenu;
    $name            = '採用情報';
    $menu[ 5 ][ 0 ]  = $name;
    $submenu[ 'edit.php' ][ 5 ][ 0 ]   = $name . '一覧';
    $submenu[ 'edit.php' ][ 10 ][ 0 ]  = '新規' . $name;
  }

  public function register_blog_as_post_type() {
    $name  = 'お知らせ';
    register_post_type( 'blog', [
      'labels' => [
        'name'           => $name,
        'singular_name'  => $name,
        'menu_name'      => $name,
        'all_items'      => $name . '一覧',
        'new_item'       => '新規' . $name,
        'add_new_item'   => '新規' . $name . 'を追加',
        'edit_item'      => $name . 'を編集',
        'view_item'      => $name . 'を表示',
        'search_items'   => $name . 'を検索'
      ],
      'public'         => true,
      'has_archive'    => true,
      'rewrite'        => [
        'with_front'     => false
      ],
      'menu_icon'      => 'dashicons-calendar-alt',
      'menu_position'  => 5,
      'show_in_rest'   => true,
      'supports'       => [
        'title',
        'editor',
        'thumbnail'
      ]
    ] );

    register_taxonomy( 'blog_cat','blog', [
      'labels' => [
        'name' => 'カテゴリー'
      ],
      'hierarchical' => true,
      'show_in_rest' => true,
    ] );
  }
}
