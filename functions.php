<?php

/**
 * CSSをインラインで追加
 */
function output_inline_style()
{
    // reset.cssの読み込み
    wp_enqueue_style('reset-style', get_template_directory_uri() . '/reset.css');

    // swiper.min.cssの読み込み
    wp_enqueue_style('swiper-style', get_template_directory_uri() . '/js/plugins/swiper/swiper-bundle.min.css');
    // CSSスタイルファイルをキューに追加
    wp_register_style('style', false);
    wp_enqueue_style('style');
    // style.cssファイルを読み込み
    $css = file_get_contents(get_stylesheet_uri(), true);
    // インラインにCSSの内容を出力
    wp_add_inline_style('style', $css);
};
add_action('wp_enqueue_scripts', 'output_inline_style');


/**title-tag をサポート */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
});


/**	投稿のサムネイルをサポート */
add_action('init', function () {
    add_theme_support('post-thumbnails');
});

// カスタム投稿タイプ
add_action('init', function () {
    register_post_type('service', [
        'public' => true,
        'label' => '技術ページ',
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => [
            'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'
        ]
    ]);
});


// ユーザープロフィールの項目のカスタマイズ
function my_user_meta($wb)
{
    //項目の追加
    $wb['main-creator'] = 'トップページに表示（半角「1」を入力で表示）';
    $wb['reserve-creator'] = '予約ページに表示（半角「1」を入力で表示）';
    $wb['stylists-creator'] = 'スタッフ紹介ページに表示（半角「1」を入力で表示）';
    $wb['comment'] = '一言コメント';
    $wb['job-title'] = '職種';

    return $wb;
}
add_filter('user_contactmethods', 'my_user_meta', 10, 1);


// 予約・お問い合わせを送信後にThanksページに遷移する
function add_thanks_page()
{
    echo <<< EOD
    <script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = './thanks';
    }, false );
    </script>
    EOD;
}
add_action('wp_footer', 'add_thanks_page');



/** 以下ショートコード */

/**
 * 投稿画面から他のページの内容を、the_content()で取り込む
 * 
 * @param str $pageSlug 取り込みたい投稿のスラッグ
 */
function get_contents_from_page($pageSlug)
{
    $args = array(
        'post_type' => 'page',
        'name' => $pageSlug[0],
    );

    $sub_query = new WP_Query($args);
    if ($sub_query->have_posts()) : while ($sub_query->have_posts()) : $sub_query->the_post();
            $theContent = get_the_content();
        endwhile;
    endif;
    wp_reset_postdata();

    return $theContent;
}
add_shortcode('get_contents_from_page', 'get_contents_from_page');


/**
 * page.phpの装飾付きタイトル
 * 
 * @param str $title タイトル
 * @param str $note タイトル下の注釈
 * @return HTML
 */
function deco_title($attr)
{
    $title_area = '<div class="decoTitle">
    <h2 class="decoTitle__title">' . $attr['title'] . '</h2></div>';
    if (!empty($attr['note'])) {
        $title_area .= '<span class="decoTitle__note">' . $attr['note'] . '</span>';
    }
    return $title_area;
}
add_shortcode('deco_title', 'deco_title');


/** page.phpの各アイテムの注釈 */

function item_note($attr)
{
    return '<span class="page__itemNote">' . $attr[0] . '</span>';
}
add_shortcode('item_note', 'item_note');


/** page.phpのセクション一番下の注釈 */
function section_note($attr)
{
    return '<span class="page__sectionNote">' . $attr[0] . '</span>';
}
add_shortcode('section_note', 'section_note');


/** 技術ページの「アクロのこだわり」ボタン */
function identity_button($attr)
{
    return '<a class="button service__button" href="../identity">アクロのこだわり</a>';
}
add_shortcode('identity_button', 'identity_button');


/** 技術ページのFlowのタイトルを表示する */
function flow_title($attr)
{
    return '<h2 class="flow__title">Flow</h2>';
}
add_shortcode('flow_title', 'flow_title');


/**
 * 技術ページのFlowを表示する
 * 
 * 画像はカスタムフィールドで指定（プラグイン「Smart Custom Field」を使用）
 * 
 * @param int $step  ステップの番号
 * @param str $title ステップのタイトル
 * @param str $body ステップの説明文
 * @param bool $arrow 下向きの矢印の有無  
 */
function step($attr)
{
    $page_id = get_the_ID();
    $img = 'step' . $attr['step'] . '-img';
    $img_id = get_post_meta($page_id, $img, true);
    $step_class = ($attr['arrow'] === 'true') ? 'step arrow' : 'step';
    $img_url = wp_get_attachment_url($img_id, 'medium', true);
    $step =
        '<div class="' . $step_class . '">
            <div class="step__titleArea">
                <p class="step__number"><span>STEP</span>0' . $attr['step'] . '</p>
                <h3 class="step__title">' . $attr['title'] . '</h3>
            </div>';
    if (!empty($img_url)) {
        $step .=
            '<figure class="step__img">
                <img src="' . $img_url . '" alt="">
            </figure>';
    }
    $step .=
        '<p class="step__body">' . $attr['body'] . '</p>
        </div>';
    return $step;
}
add_shortcode('step', 'step');


/**
 *  キャンペーンページの各キャンペーンのに表示する詳細 
 * 
 * @param str $one          アイテム1
 * @param str $two          アイテム2（省略可）
 * @param str $three        アイテム3（省略可）
 * @param int $price_before 値引き前の値段（省略可） 
 * @param int $price        値引き後の値段
 * @param str $body         説明文
 * @param str $note         注釈
 */

function campaign($attr)
{
    $set =
        '<div class="set">
        <div class="set__top">
            <div class="set__items">
                <p class="set__item">' . $attr['one'] . '</p>';
    if (!empty($attr['two'])) {
        $set .= '<p class="set__item">' . $attr['two'] . '</p>';
    }
    if (!empty($attr['three'])) {
        $set .= '<p class="set__item">' . $attr['three'] . '</p>';
    }
    $set .=
        '   </div>
            <div class="set__priceArea is-hidden-sp">';
    if (!empty($attr['price_before'])) {
        $set .= '<p class="set__price--before">税込￥' . $attr['price_before'] . '⇒</p>';
    }
    $set .=
        '       <p class="set__price">税込￥<span class="set__price--large">' . $attr['price'] . '</span></p>
            </div>
        </div>
        <p class="set__body">' . $attr['body'] . '</p>
        <p class="set__note">' . $attr['note'] . '</p>
        <div class="set__priceArea is-shown-sp--flex">';
    if (!empty($attr['price_before'])) {
        $set .= '<p class="set__price--before">税込￥' . $attr['price_before'] . '⇒</p>';
    }
    $set .=
        '       <p class="set__price">税込￥<span class="set__price--large">' . $attr['price'] . '</span></p>
                </div>
    
    </div>';

    return $set;
}
add_shortcode('campaign', 'campaign');


/** 以上ショートコード */
