<?php get_header(); ?>

<?php
$user_id = get_the_author_meta('ID');
?>

<section class="pageTop">
    <div class="inner">
        <h1 class="pageTitle stylist__title">Stylist</h1>
        <p class="pageSubtitle stylist__subtitle">スタッフ紹介</p>
    </div>
</section>

<section class="stylist">
    <div class="inner stylist__inner">
        <div class="stylists__card">
            <figure class="stylists__img">
                <?php echo get_avatar($user_id, 300); ?>
            </figure>
            <div class="stylists__textArea">
                <p class="stylists__jobTitle"><?php echo get_user_meta($user_id, 'job-title', true); ?></p>
                <h2 class="stylists__name"><?php echo get_user_meta($user_id, 'nickname', true); ?></h2>
                <span class="stylists__enName"><?php echo get_user_meta($user_id, 'last_name', true); ?>&nbsp;<?php echo get_user_meta($user_id, 'first_name', true); ?></span>
            </div>
        </div>

        <div class="stylist__profile">
            <p class="stylists__profileBody"><?php echo get_user_meta($user_id, 'description', true); ?></p>

        </div>

        <div class="stylist__schedule">
            <?php echo do_shortcode('[attmgr_weekly id="' . $user_id . '"]'); ?>
        </div>
    </div>
    <a class="button stylists__button" href="<?php echo esc_url(home_url('/reserve')); ?>">ご予約・お問い合わせ</a>
</section>
<?php get_footer(); ?>