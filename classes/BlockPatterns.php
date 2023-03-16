<?php
namespace IwamidenkoRecruit_Theme;

trait BlockPatterns {

  public function add_my_block_patterns() {

    $pattern1 = [
      'title'        => 'recruit-columns',
      'categories'   => [ 'recruit' ],
      'descripiton'  => '採用情報カラム',
      'content'      => '<!-- wp:group {"className":"recruitCols","layout":{"type":"constrained"}} -->
        <div class="wp-block-group recruitCols"><!-- wp:group {"className":"recruitCols__headingWrap","layout":{"type":"constrained"}} -->
        <div class="wp-block-group recruitCols__headingWrap"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"left":"var:preset|spacing|50"}}},"className":"recruitCols__heading"} -->
        <h3 class="recruitCols__heading" style="margin-left:var(--wp--preset--spacing--50)"><strong>チャレンジ&amp;成長できる！</strong></h3>
        <!-- /wp:heading -->
        
        <!-- wp:separator {"backgroundColor":"primary","className":"is-style-wide recruitCols__line"} -->
        <hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-wide recruitCols__line"/>
        <!-- /wp:separator --></div>
        <!-- /wp:group -->
        
        <!-- wp:image {"id":88,"sizeSlug":"full","linkDestination":"none","className":"recruitCols__image"} -->
        <figure class="wp-block-image size-full recruitCols__image"><img src="https://iwamidenko.com/recruit1/wp-content/uploads/2023/03/img000.jpg" alt="" class="wp-image-88"/></figure>
        <!-- /wp:image -->
        
        <!-- wp:paragraph {"className":"recruitCols__content"} -->
        <p class="recruitCols__content">建築現場での内線工事や、ドラックストアなどの商業施設での空調・TV・インターネット通信も含めた電気設備工事のお仕事です。<br>様々な現場に出向き施工してもらいます。<br>現場に出たことがない方も、一から丁寧に教えますので安心してください！</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group -->'
    ];

    register_block_pattern( $pattern1[ 'title' ], $pattern1 );

    $pattern2 = [
      'title'        => 'recruit-table',
      'categories'   => [ 'recruit' ],
      'descripiton'  => '採用情報テーブル',
      'content'      => '<!-- wp:group {"className":"requirements","layout":{"type":"constrained"}} -->
        <div class="wp-block-group requirements"><!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}}} -->
        <h3 class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--60)"><strong>募集要項</strong></h3>
        <!-- /wp:heading -->
        
        <!-- wp:table -->
        <figure class="wp-block-table"><table><tbody><tr><td>募集職種</td><td>中途採用/業界未経験OK！電気工事士【年間休日120日】</td></tr><tr><td>雇用形態</td><td>正社員</td></tr><tr><td>募集対象</td><td>高卒以上<br>第二種電気工事士をお持ちの方<br>普通自動車運転免許をお持ちの方(ＡＴ限定不可)</td></tr><tr><td>勤務時間</td><td>8:00～17:00(休憩80分)<br>※月平均残業は10ｈ程度です。</td></tr><tr><td>仕事内容</td><td>月給 180,000円〜400,000円<br>その他の手当<br>・皆勤手当 10,000円<br>・資格手当 5,000円～20,000円<br>・出張手当 4,000円／日　他</td></tr><tr><td>勤務地</td><td>岩見電工株式会社 能美営業所<br>石川県能美市徳久町レ37番3 （岩見電工 能美営業所）</td></tr><tr><td>給与</td><td>月給 180,000円〜400,000円<br>その他の手当<br>・皆勤手当 10,000円<br>・資格手当 5,000円～20,000円<br>・出張手当 4,000円／日　他</td></tr><tr><td>月収例</td><td>【月収例】<br>月収237,000円〜262,000円(基本給＋各種手当＋残業代)<br>※残業10h<br>※固定残業代は時間外労働の有無に関わらず32時間分を支給し、超<br>過分については、別途支給する。</td></tr><tr><td>待遇・福利厚生</td><td>■社会保険完備<br>■車通勤可<br>■昇給あり<br>■賞与(年3回)あり<br>■退職金制度あり(勤続3年以上)<br>■資格手当あり(5,000円～20,000円/月)<br>■交通費規定支給(月上限20,000円)<br>※試用期間3か月(給与同額)</td></tr><tr><td>休日休暇</td><td>土日祝休み【完全週休2日】【年間休日120日】<br>※夏季休暇（お盆休み）・GW・年末年始休暇<br>※業務上、土日祝（休日）出社がある場合は、代休取得などをご相談しています。<br>※6ヶ月経過後、有給休暇10日あり</td></tr><tr><td>採用フロー</td><td>応募→面接となります｡</td></tr></tbody></table></figure>
        <!-- /wp:table -->

        <!-- wp:shortcode -->
        [entryBtn]
        <!-- /wp:shortcode --></div>
        <!-- /wp:group -->'
    ];

    register_block_pattern( $pattern2[ 'title' ], $pattern2 );

    register_block_pattern_category( 'recruit', [ 'label' => '採用情報' ] );

    add_filter( 'should_load_remote_block_patterns', function () {
      return false;
    } );

    unregister_block_pattern_category( 'buttons');
    unregister_block_pattern_category( 'columns');
    unregister_block_pattern_category( 'gallery');
    unregister_block_pattern_category( 'header');
    unregister_block_pattern_category( 'text');
    unregister_block_pattern_category( 'query');

  }

}
