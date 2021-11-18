<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('./includes/top'); ?>
        <section class="gallery">
            <div class="inner gallery__inner">
                <?php echo do_shortcode('[instagram-feed num=24 cols=4 imageres=small showheader=false showfollow=false showbutton=true imagepadding=15]'); ?>
            </div>
            <a class="button gallery__button" href="<?php echo esc_url(home_url('/reserve')); ?>">ご予約・お問い合わせ</a>

        </section>

<?php
    endwhile;
endif;
wp_reset_postdata();
?>

<?php get_footer(); ?>