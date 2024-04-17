<?php
/**
 * Iwamidenko functions
 * Author: Taigo Ito (https://qwel.design/)
 * Location: Fukui, Japan
 * @package Iwamidenko
 */

/*
 * テーマのパス, URI
 */
define( 'Iwamidenko_THEME_DIR', get_template_directory() );
define( 'Iwamidenko_THEME_URI', get_template_directory_uri() );


/*
 * classのオートロード
 */
spl_autoload_register(
	function( $classname ) {
		if ( strpos( $classname, 'Iwamidenko_Theme' ) === false ) return;
		$classname = str_replace( '\\', '/', $classname );
		$classname = str_replace( 'Iwamidenko_Theme/', '', $classname );
		$file      = Iwamidenko_THEME_DIR . '/classes/' . $classname . '.php';
		if ( file_exists( $file ) ) {
			require $file;
		}
	}
);

/*
 * Hookする関数群を継承して登録
 */
class Iwamidenko {
	use	\Iwamidenko_Theme\Supports,
		\Iwamidenko_Theme\Scripts,
		\Iwamidenko_Theme\Shortcodes,
		\Iwamidenko_Theme\ChangePostObjectLabel,
		\Iwamidenko_Theme\ChangePostMenuLabel,
		\Iwamidenko_Theme\BlockPatterns;
		
	public function __construct() {
		// テーマサポート機能
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

		// CSS, JSファイルを読み込み
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		// ショートコード登録
		add_action( 'init', [ $this, 'register_shortcode' ] );

		// オブジェクトラベル変更
		add_action( 'init', [ $this, 'change_post_object_label' ] );

		// メニューラベル変更
		add_action( 'admin_menu', [ $this, 'change_post_menu_label' ] );

		// ブロックパターン追加
		add_action( 'init', [ $this, 'add_my_block_patterns' ] );
	}
}

/**
 * Iwamidenko start!
 */
new Iwamidenko();
