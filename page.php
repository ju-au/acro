<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        $top_part = "";
        if (is_page(9) || is_page(19) || is_page(23) || is_page(33)) {
            // メニュー・こだわり・スタイリスト・ご予約ページ
            $top_part = "./includes/top";
        } elseif (is_page(35)) {
            // thanksページ
        } else {
            // その他
            $top_part = "./includes/page-title";
        }
        get_template_part($top_part); ?>
        <section>
            <div class="inner">
                <?php the_content() ?>
            </div>
        </section>

<?php
    endwhile;
endif;
?>
<?php get_footer(); ?>