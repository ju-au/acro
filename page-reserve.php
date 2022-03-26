<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('./includes/top'); ?>


        <section class="phone">
            <div class="inner phone__inner">
                <div class="phone__wrapper">

                    <h2 class="phone__title">お電話でのご予約・お問い合わせはこちら</h2>
                    <p class="phone__number">03-6808-6614</p>
                </div>
            </div>
        </section>

        <section class="guide">
            <div class="inner">
                <h2 class="guide__toSchedule">スタイリスト出勤日</h2>
                <p class="guide__toMail">メールでのご予約<span class="is-hidden-sp">・</span><br class="is-shown-sp">お問い合わせはこちら</p>
                <figure class="guide__arrow"><img src="<?php echo get_template_directory_uri(); ?>/images/reserve/guide-arrow.png" alt=""></figure>
            </div>
        </section>

        <section class="schedule">
            <div class="inner schedule__inner">
                <?php echo do_shortcode('[deco_title title="スタイリスト出勤日" note=""]'); ?>
                <div class="schedule__calender">
                    <div class="schedule__tabArea">
                        <?php
                        $users = get_users();
                        foreach ($users as $user) :
                            $uid = $user->ID;
                            $show_on_reserve =  get_user_meta($uid, 'reserve-creator', true);
                            if ($show_on_reserve == 1) :
                        ?>
                                <span class="schedule__tab" id="schedule__tab--<?php echo $uid; ?>" data-uid="<?php echo $uid; ?>"><?php echo get_user_meta($uid, 'nickname', true); ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.reserve__tabArea -->
                    <div class="schedule__bodyArea">
                        <?php
                        foreach ($users as $user) :
                            $uid = $user->ID;
                            $show_on_reserve =  get_user_meta($uid, 'reserve-creator', true);
                            if ($show_on_reserve == 1) :
                        ?>
                                <div class="schedule__body" id="schedule__body--<?php echo $uid; ?>"><?php echo do_shortcode('[attmgr_weekly id="' . $uid . '"]'); ?></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <p class="schedule__note">
                            各スタイリストの出勤日を表示しております。<br>
                            <br>
                            <span>※予約の空き状況ではありません。<br></span>
                            <span>※急遽変更することもございます。ご了承ください。</span>
                        </p>
                    </div>
                    <!-- /.schedule__bodyArea -->
                </div>
                <!-- /.schedule__calender -->
            </div>
            <!-- /.schedule__inner -->
        </section>
        <?php echo do_shortcode('[contact-form-7 id="283" title="ご予約・お問い合わせフォーム"]'); ?>

        <div id="form__closure--hidden" style="display: hidden;"><?php echo '定休：' . get_post_meta(39, '定休日', true); ?></div>

<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>