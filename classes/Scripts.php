<?php
namespace IwamidenkoRecruit_Theme;

trait Scripts {
  // CSS, JSファイルを読み込み
  public static function enqueue_scripts() {
    // バージョン情報を取得
		$version = wp_get_theme()->get( 'Version' );

		// Google Fonts
    $family = 'Noto+Sans+JP:wght@400;700&family=Poppins:wght@400;700';
    if ($family !== '') {
      wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=' . $family . '&display=swap', [], null); 
    }

		// style.css
		wp_enqueue_style(
			'style',
			get_template_directory_uri() . '/style.css',
			[],
			$version
		);

		// init.js
		wp_enqueue_script(
			'init',
			get_template_directory_uri() . '/init.js',
			[],
			$version,
			true
		);

  }

}
