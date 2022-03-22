<?php get_header(); ?>

<?php
$user_id = get_the_author_meta('ID');
?>

<?php get_template_part("./includes/page-title"); ?>


<section class="stylist">
    <div class="inner stylist__inner">
        <div class="stylist__profile">
            <figure class="stylist__img" id="stylist__img">
                <?php echo get_avatar($user_id, 300); ?>
            </figure>
            <p class="stylist__profileBody" id="stylist__profileBody"><?php echo get_user_meta($user_id, 'description', true); ?></p>
        </div>
        <?php
        $video_url = get_user_meta($user_id, 'video', true);
        if (!empty($video_url)) :
            $video_url = str_replace('watch?v=', 'embed/', $video_url);
        ?>
            <div class="stylist__videoWrapper">
                <iframe class="stylist__video" width="560" height="315" src="<?php echo $video_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        <?php endif; ?>
        <div class="stylist__schedule">
            <?php echo do_shortcode('[deco_title title="出勤日" note=""]'); ?>
            <?php echo do_shortcode('[attmgr_weekly id="' . $user_id . '"]'); ?>
        </div>
        <a class="button" href="<?php echo esc_url(home_url('/reserve')); ?>">ご予約・お問い合わせ</a>
</section>
<?php get_footer(); ?>