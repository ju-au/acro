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


// ユーザープロフィールの項目のカスタマイズ
function my_user_meta($wb)
{
    //項目の追加
    $wb['main-creator'] = 'トップページに表示（表示するには「1」を入力してください）';
    $wb['comment'] = '一言コメント';
    $wb['job-title'] = '職種';

    return $wb;
}
add_filter('user_contactmethods', 'my_user_meta', 10, 1);
