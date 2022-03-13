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


/**
 * 以下をサポート
 * 	title-tag
 */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
});


/**
 * 以下をサポート
 * 	投稿のサムネイル
 */
add_action('init', function () {
    add_theme_support('post-thumbnails');
});

// カスタム投稿タイプ
add_action('init', function () {
    register_post_type('skill', [
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


// 投稿画面から他のページの内容を、the_content()で取り込む
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


// page.phpの装飾付きタイトル
function deco_title($attr)
{
    $title_area = '<div class="page__sectionTitleArea">
    <h2 class="page__sectionTitle">' . $attr['title'] . '</h2></div>';
    if (!empty($attr['note'])) {
        $title_area .= '<span class="page__sectionTitleNote">' . $attr['note'] . '</span>';
    }
    return $title_area;
}
add_shortcode('deco_title', 'deco_title');


// page.phpの注釈
function page_note($attr)
{
    return '<span class="page__note">' . $attr[0] . '</span>';
}
add_shortcode('page_note', 'page_note');
