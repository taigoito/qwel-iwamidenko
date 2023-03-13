<?php
/**
 * Iwamidenko Recruit functions
 * Author: Taigo Ito (https://qwel.design/)
 * Location: Fukui, Japan
 * @package Iwamidenko-Recruit
 */

/*
 * テーマのパス, URI
 */
define( 'IwamidenkoRecruit_THEME_DIR', get_template_directory() );
define( 'IwamidenkoRecruit_THEME_URI', get_template_directory_uri() );


/*
 * classのオートロード
 */
spl_autoload_register(
	function( $classname ) {
		if ( strpos( $classname, 'IwamidenkoRecruit_Theme' ) === false ) return;
		$classname = str_replace( '\\', '/', $classname );
		$classname = str_replace( 'IwamidenkoRecruit_Theme/', '', $classname );
		$file      = IwamidenkoRecruit_THEME_DIR . '/classes/' . $classname . '.php';
		if ( file_exists( $file ) ) {
			require $file;
		}
	}
);

/*
 * Hookする関数群を継承して登録
 */
class IwamidenkoRecruit {
	use	\IwamidenkoRecruit_Theme\Supports,
		\IwamidenkoRecruit_Theme\Scripts,
		\IwamidenkoRecruit_Theme\Shortcodes,
		\IwamidenkoRecruit_Theme\ChangePostObjectLabel,
		\IwamidenkoRecruit_Theme\ChangePostMenuLabel;
		
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
	}
}

/**
 * IwamidenkoRecruit start!
 */
new IwamidenkoRecruit();
