<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('./includes/top'); ?>


        <section class="reserve__phone">
            <div class="inner reserve__inner">
                <h2>お電話でのご予約・お問い合わせはこちら</h2>
                <p>03-6808-6614</p>
            </div>
        </section>


        <section class="reserve__workingDays">
            <div class="inner reserve__inner">
                <h2>スタイリスト出勤日</h2>
                <p>メールでのご予約・お問い合わせはこちら</p>
                <h3>スタイリスト出勤日</h3>
                <div class="reserve__calender">
                    <div class="reserve__tabArea">
                        <?php
                        $users = get_users();
                        foreach ($users as $user) :
                            $uid = $user->ID;
                            $show_on_reserve =  get_user_meta($uid, 'reserve-creator', true);
                            if ($show_on_reserve == 1) :
                        ?>
                                <span class="reserve__tab" id="reserve__tab--<?php echo $uid; ?>" data-uid="<?php echo $uid; ?>"><?php echo get_user_meta($uid, 'nickname', true); ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.reserve__tabArea -->
                    <div class="reserve__bodyArea">
                        <?php
                        foreach ($users as $user) :
                            $uid = $user->ID;
                            $show_on_reserve =  get_user_meta($uid, 'reserve-creator', true);
                            if ($show_on_reserve == 1) :
                        ?>
                                <div class="reserve__body" id="reserve__body--<?php echo $uid; ?>"><?php echo do_shortcode('[attmgr_weekly id="' . $uid . '"]'); ?></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.reserve__bodyArea -->
                </div>
                <!-- /.reserve__calender -->
            </div>
            <!-- /.reserve__inner -->
        </section>

        <?php echo do_shortcode('[contact-form-7 id="283" title="ご予約・お問い合わせフォーム"]'); ?>
<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>
