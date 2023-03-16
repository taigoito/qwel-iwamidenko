<?php
namespace IwamidenkoRecruit_Theme;

trait Shortcodes {
  // ショートコード登録
  public function register_shortcode() {
    // 応募フォームへのボタンを作成
    add_shortcode( 'entryBtn', [ $this, 'get_entryBtn' ] );

    // 応募フォームの表題を作成
    add_shortcode( 'entryTitle', [ $this, 'get_entryTitle' ] );

    // パンくずリストを作成
    add_shortcode( 'breadcrumb', [ $this, 'get_breadcrumb' ] );

    // コピーライトに現在年を添える
    add_shortcode( 'copyright', [ $this, 'get_copyright' ] );
    
  }

  public function get_entryBtn() {
    // 投稿IDを取得して、パラメータを付与したリンクを返す
    $wp_obj = get_queried_object();
    $post_id     = $wp_obj->ID;

    $html = '<a class="btnEntry" href="../entry/?recruit_id=' . $post_id . '">この仕事に応募する</a>';

    return $html;

  }

  public function get_entryTitle() {

    if ( isset( $_GET[ 'recruit_id' ] ) ) {
      $post_id = $_GET[ 'recruit_id' ];
      $title   = get_the_title( $post_id );
      $html    = '<h2 class="entryTitle">' . $title . '</h2>';
      return $html;
    } else {
      $html = '';
      return $html;
    }

  }

  public function get_breadcrumb( $atts ) {
    $html = '<ul id="breadcrumb" class="breadcrumb">';
    $html .= '<li class="breadcrumb__item"><a href="' . home_url( '/' ) . '">top</a></li>';

    $wp_obj = get_queried_object();
    /**
     * 投稿一覧ページ
     */
    if (is_home()) {

      $html .= '<li class="breadcrumb__item">' . get_post_type_object( 'post' )->label . '</li>';

    /**
     * 個別投稿ページ
     */
    } else if ( is_single() ) {
      $post_id     = $wp_obj->ID;
      $post_type   = $wp_obj->post_type;
      $post_title  = $wp_obj->post_title;

      // カスタム投稿タイプの場合、投稿タイプ一覧を表示
      if ( $post_type !== 'post' ) {

        $html .= '<li class="breadcrumb__item"><a href="' . get_post_type_archive_link($post_type) . '">' . get_post_type_object($post_type)->label . '</a></li>';

      }

      // カスタム投稿タイプから、タクソノミーを取得
      if ( $post_type == 'post' ) {
        // 「投稿」の場合、「カテゴリー」を取得
        $tax_name = 'category';

        /**
         * カスタムタクソノミーを作成した場合は、ここに処理を追加
         */

      } else {
        $tax_name = '';
      }

      // タクソノミーが紐づいていれば表示
      if ( $tax_name != '' ) {
        $terms = get_the_terms( $post_id, $tax_name ); // 投稿に紐づく全タームを取得

        if ( !empty( $terms )) {
          $term = $terms[0];

          /* Custom */
          if ( $term->slug !== 'feature' ) {

            // 親タームがあれば表示
            if ( $term->parent > 0 ) {
              $parent_array = array_reverse(get_ancestors( $term->term_id, $tax_name ));
              foreach ( $parent_array as $parent_id ) {
                $parent_term = get_term( $parent_id, $tax_name );

                $html .= '<li class="breadcrumb__item"><a href="' . get_term_link( $parent_id, $tax_name ) . '">' . $parent_term->name . '</a></li>';

              }
            }

            // 最下層タームを表示

            $html .= '<li class="breadcrumb__item"><a href="' . get_term_link( $term->term_id, $tax_name ) . '">' . $term->name . '</a></li>';

          }
        }
      }

      // 自身

      $html .= '<li class="breadcrumb__item">' . $post_title . '</li>';
    
    /**
     * 固定ページ
     */
    } else if ( is_page() ) {
      $page_id     = $wp_obj->ID;
      $page_title  = $wp_obj->post_title;

      // 親ページがあれば表示
      if ( $wp_obj->post_parent > 0 ) {
        $parent_array = array_reverse(get_post_ancestors( $page_id ));
        foreach ( $parent_array as $parent_id ) {

          $html .= '<li class="breadcrumb__item"><a href="' . get_permalink( $parent_id ) . '">' . get_the_title( $parent_id ) . '</a></li>';

        }
      }

      // 自身

      $html .= '<li class="breadcrumb__item">' . $page_title . '</li>';

    /**
     * カスタム投稿アーカイブ
     */
    } else if ( is_post_type_archive() ) {

      $html .= '<li class="breadcrumb__item">' . $wp_obj->label . '</li>';

    /**
     * 日付別
     */
    } else if ( is_date() ) {
      $year    = get_query_var( 'year' );
      $month   = get_query_var( 'monthnum' );
      $day     = get_query_var( 'day' );

      // 日別アーカイブ
      if ( $day > 0 ) {

        $html .= '<li class="breadcrumb__item"><a href="' . get_year_link( $year ) . '">' . $year . '</a></li>';
        $html .= '<li class="breadcrumb__item"><a href="' . get_month_link( $year, $month ) . '">' . sprintf( '%02d', $month) . '</a></li>';
        $html .= '<li class="breadcrumb__item">' . sprintf( '%02d', $day ) . '</li>';

      // 月別アーカイブ
      } else if ( $month > 0 ) {

        $html .= '<li class="breadcrumb__item"><a href="' . get_year_link( $year ) . '">' . $year . '</a></li>';
        $html .= '<li class="breadcrumb__item">' . sprintf( '%02d', $month ) . '</li>';

      // 年別アーカイブ
      } else {

        $html .= '<li class="breadcrumb__item">' . $year . '</li>';

      }
    /**
     * 投稿者アーカイブ
     */
    } else if ( is_author() ) {

      $html .= '<li class="breadcrumb__item">著者: ' . $wp_obj->display_name . '</li>';

    /**
     * タームアーカイブ
     */
    } else if ( is_archive() ) {
      $post_type = '';
      $term      = $wp_obj;
      $term_id   = $wp_obj->term_id;
      $term_name = $wp_obj->name;
      $tax_name  = $wp_obj->taxonomy;

      // 「カテゴリー」、「タグ」の場合、「投稿」を取得
      if ( $tax_name == 'category' || $tax_name == 'post_tag' ) {
        $post_type = 'post';
      }

      /**
       * カスタムタクソノミーを作成した場合は、ここに処理を追加
       */

      // カスタム投稿タイプの場合、投稿タイプ一覧を表示
      if ( $post_type !== 'post' ) {

        $html .= '<li class="breadcrumb__item"><a href="' . get_post_type_archive_link( $post_type ) . '">' . get_post_type_object( $post_type )->label . '</a></li>';

      }
      
      // 親タームがあれば表示
      if ( $term->parent > 0 ) {
        $parent_array = array_reverse(get_ancestors( $term->term_id, $tax_name ));
        foreach ( $parent_array as $parent_id ) {
          $parent_term = get_term( $parent_id, $tax_name );

          $html .= '<li class="breadcrumb__item"><a href="' . get_term_link( $parent_id, $tax_name ) . '">' . $parent_term->name . '</a></li>';

        }
      }

      // 自身
      $html .= '<li class="breadcrumb__item">' . $term_name . '</li>';

    /**
     * 検索結果ページ
     */
    } else if ( is_search() ) {

      $html .= '<li class="breadcrumb__item">検索: ' . get_search_query() . '</li>';

    /**
     * 404ページ
     */
    } else if ( is_404() ) {

      $html .= '<li class="breadcrumb__item">404 記事が見つかりません</li>';
    
    }
    
    return $html . '</ul>';

  }

  public function get_copyright( $atts ) {

    return '<small>&copy;Iwamidenko.Co., Ltd. All Rights Reserved.</small>';

  }

}
