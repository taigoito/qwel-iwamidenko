<?php
namespace IwamidenkoRecruit_Theme;

trait Shortcodes {
  // ショートコード登録
  public function register_shortcode() {

    // コピーライトに現在年を添える
    add_shortcode( 'copyright', [ $this, 'get_copyright' ] );
    
  }

  public function get_copyright( $atts ) {

    return '<small>&copy;Iwamidenko.Co., Ltd. All Rights Reserved.</small>';

  }

}
