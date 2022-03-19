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


// 新規投稿時に投稿表示順の初期値を挿入する
function my_hook($post_id, $post, $update)
{
    if ($update == false) { // 新規投稿のみ
        if (get_post_meta($post_id, 'トップページ：表示順', true) == '') {
            update_post_meta($post_id, 'トップページ：表示順',  9999);
        }
    }
}
add_action('save_post', 'my_hook', 10, 3);



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


/** 以上ショートコード */
