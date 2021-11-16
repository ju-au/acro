<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('./includes/top'); ?>


        <section class="stylists">
            <div class="stylist__cards">

                <?php
                $users = get_users(array());
                foreach ($users as $user) :
                    $uid = $user->ID;
                ?>
                    <div class="stylists__card">
                        <figure class="stylists__img">
                            <?php echo get_avatar($uid, 300); ?>
                        </figure>
                        <div class="stylists__textArea">
                            <p class="stylists_-jobTitle"><?php echo get_user_meta($uid, 'job-title', true); ?></p>
                            <h2 class="stylists__name"><?php echo get_user_meta($uid, 'nickname', true); ?></h2>
                            <span class="stylists__enName"><?php echo get_user_meta($uid, 'last_name', true); ?>&nbsp;<?php echo get_user_meta($uid, 'first_name', true); ?></span>
                            <p class="stylists__comment"><?php echo get_user_meta($uid, 'comment', true); ?></p>
                            <a class="stylists__link" href="<?php echo get_author_posts_url($uid) ?>">More</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <a class="button stylists__button" href="<?php echo esc_url(home_url('/reserve')); ?>">ご予約・お問い合わせ</a>

        </section>

<?php
    endwhile;
endif;
wp_reset_postdata();
?>
<?php get_footer(); ?>