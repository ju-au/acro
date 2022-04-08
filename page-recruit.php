<?php get_header(); ?>

<?php get_template_part('./includes/page-title'); ?>

<section class="shopData">
    <ul class="inner shopData__inner">
        <li class="shopData__item shopData__item--since">
            <h3 class="shopData__title">開店</h3>
            <p class="shopData__number">2013<span class="shopData__unit">年</span></p>
            <figure class="shopData__deco"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-since.png" alt=""></figure>
        </li>
        <li class="shopData__item shopData__item--gender">
            <h3 class="shopData__title">お客様<br class="is-shown-sp">男女比率</h3>
            <div class="shopData__flex">
                <p class="shopData__number">3:7</p>
            </div>
            <!-- /.shopData__flex -->
            <figure class="shopData__deco shopData__deco--1"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-gender1.png" alt=""></figure>
            <figure class="shopData__deco shopData__deco--2"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-gender2.png" alt=""></figure>
        </li>
        <li class="shopData__item shopData__item--staffs">
            <h3 class="shopData__title">スタッフ数</h3>
            <figure class="shopData__deco"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-staffs.png" alt=""></figure>
            <p class="shopData__number">3<span class="shopData__unit">名</span></p>
        </li>
        <li class="shopData__item shopData__item--ages">
            <h3 class="shopData__title">お客さまの年齢層</h3>
            <div class="shopData__flex">
                <p class="shopData__number">30<span class="shopData__unit">歳代</span></p>
                <figure class="shopData__arrow"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-arrow.png" alt=""></figure>
                <p class="shopData__number">50<span class="shopData__unit">歳代</span></p>
            </div>
            <!-- /.shopData__flex -->
            <figure class="shopData__deco shopData__deco--1"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-ages.png" alt=""></figure>
            <figure class="shopData__deco shopData__deco--2"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-ages.png" alt=""></figure>
        </li>
        <li class="shopData__item shopData__item--leaves">
            <h3 class="shopData__title">有給消化率</h3>
            <div class="shopData__flex">
                <p class="shopData__number"> 100<span class="shopData__unit">%</span></p>
                <figure class="shopData__deco"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-leaves.png" alt=""></figure>
            </div>
            <!-- /.shopData__flex -->
        </li>
        <li class="shopData__item shopData__item--finish">
            <h3 class="shopData__title">退社時間</h3>
            <div class="shopData__flex">
                <p class="shopData__number">19<span class="shopData__unit">時</span></p>
                <figure class="shopData__deco"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-finish.png" alt=""></figure>
            </div>
            <!-- /.shopData__flex -->
        </li>
        <li class="shopData__item shopData__item--menu">
            <h3 class="shopData__title">メニュー別売上比率</h3>
            <div class="shopData__flex">
                <figure class="shopData__deco shopData__deco--1"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-menu1.png" alt=""></figure>
                <p class="shopData__number">66:<br><span class="shopData__menuName">カラー</span></p>
                <p class="shopData__number">13:<br><span class="shopData__menuName">パーマ</span></p>
                <p class="shopData__number">21<br><span class="shopData__menuName">縮毛矯正</span></p>
                <figure class="shopData__deco shopData__deco--2"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-menu2.png" alt=""></figure>
            </div>
            <!-- /.shopData__flex -->
            <figure class="shopData__deco shopData__deco--3"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/shopData-menu3.png" alt=""></figure>
        </li>
    </ul>
    <!-- /.inner -->
</section>
<!-- /.shopData -->


<section class="recruitVideo">
    <div class="inner">
        <?php echo do_shortcode('[deco_title title="YouTubeでリクルート動画公開中"]'); ?>
        <div class="recruitVideo__video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/3FDNAcXuWHk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <?php echo do_shortcode('[deco_title title="スタッフとの対談動画"]'); ?>
        <div class="recruitVideo__video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/38SDBKWO4NY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <!-- /.inner -->
</section>
<!-- /.recruitVideo -->


<section class="greeting">
    <div class="greeting__titleArea">
        <h2 class="sectionTitle greeting__title">Concent</h2>
        <p class="sectionSubtitle greeting__subtitle">代表の想い</p>
    </div>
    <!-- /.greeting__titleArea -->
    <div class="greeting__container">

        <div class="inner greeting__inner">
            <?php
            $args = [
                'page_id' => 623,
                // 'page_id' => 566,
            ];
            $sub_query = new WP_Query($args);
            if ($sub_query->have_posts()) :
                while ($sub_query->have_posts()) :
                    $sub_query->the_post();
            ?>
                    <figure class="greeting__img"><?php the_post_thumbnail() ?></figure>
                    <div class="greeting__body"><?php the_content(); ?></div>

            <?php endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
        <!-- /.inner greeting__inner -->
    </div>
    <!-- /.greeting__container -->
</section>
<!-- /.greeting -->


<section class="workFlow">
    <?php 
    $setting_page_id = 634; 
    // $setting_page_id = 604; 
    $timeLine_img_1 = "0850";
    $timeLine_img_2 = "0900";
    $timeLine_img_3 = "09000930";
    $timeLine_img_5 = "12301330";
    $timeLine_img_6 = "15301600";
    $timeLine_img_7 = "1730";
    ?>
    <div class="inner workFlow__inner">
        <h2 class="sectionTitle workFlow__title">Work</h2>
        <p class="sectionSubtitle workFlow__subtitle">日々の仕事の流れ</p>
        <h3 class="workFlow__start">Flow</h3>
        <div class="workFlow__wrapper">
            <div class="workFlow__left is-hidden-tab">
                <div class="timeLine timeLine--1">
                    <img class="timeLine__time timeLine__time--1" src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-0850.png" alt="">
                    <figure class="timeLine__img"><img src="<?php echo wp_get_attachment_url(intval(get_post_meta($setting_page_id, $timeLine_img_1, true))); ?>"></figure>
                    <div class="timeLine__bodyArea">
                        <h4 class="timeLine__title">出勤</h4>
                        <p class="timeLine__body">
                            荷物や上着をロッカーに入れ、<br>
                            タイムカードを押して朝礼の準備
                        </p>
                    </div>
                </div>
                <!-- /.timeLine -->
                <div class="timeLine timeLine--3">
                    <img class="timeLine__time timeLine__time--3" src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-0900-0930.png" alt="">
                    <figure class="timeLine__img"><img src="<?php echo wp_get_attachment_url(intval(get_post_meta($setting_page_id, $timeLine_img_3, true))); ?>" alt=""></figure>
                    <div class="timeLine__bodyArea">
                        <h4 class="timeLine__title">オープン</h4>
                        <p class="timeLine__body">
                            タオルをたたみ、お客様を気持ちよく<br>
                            迎えられるように隅々まで掃除をします。
                        </p>
                    </div>
                </div>
                <!-- /.timeLine -->
                <div class="timeLine timeLine--5">
                    <img class="timeLine__time timeLine__time--5" src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-1230-1330.png" alt="">
                    <figure class="timeLine__img"><img src="<?php echo wp_get_attachment_url(intval(get_post_meta($setting_page_id, $timeLine_img_5, true))); ?>" alt=""></figure>
                    <div class="timeLine__bodyArea">
                        <h4 class="timeLine__title">ランチ</h4>
                        <p class="timeLine__body">
                            予約状況をみながら前もって予約を<br>
                            空けているので計画的に休憩に入れます。
                        </p>
                    </div>
                </div>
                <!-- /.timeLine -->
                <div class="timeLine timeLine--7">
                    <img class="timeLine__time timeLine__time--7" src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-1730.png" alt="">
                    <figure class="timeLine__img"><img src="<?php echo wp_get_attachment_url(intval(get_post_meta($setting_page_id, $timeLine_img_7, true))); ?>" alt=""></figure>
                    <div class="timeLine__bodyArea">
                        <p class="timeLine__body">すきま時間を利用して徐々に夜掃除開始</p>
                    </div>
                </div>
                <!-- /.timeLine -->
            </div>
            <!-- /.workflow__left -->

            <div class="workFlow__middle is-hidden-tab">
                <figure class="workFlow__clock is-hidden-tab"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-middle.png" alt=""></figure>
                <!-- <figure class="workFlow__clock is-shown-tab"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/clock-line.png" alt=""></figure> -->
                <div class="workFlow__finish">
                    <figure class="workFlow__finishTime"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-1900.png" alt=""></figure>
                    <div class="workFlow__finishBodyArea">
                        <h4 class="workFlow__finishTitle">営業終了</h4>
                        <p class="workFlow__finishBody">
                            掃除を済ませ、入客していなければ<br>
                            帰宅できます。
                        </p>
                    </div>
                    <!-- /.workFlow__finishBodyArea -->
                </div>
                <!-- /.workFlow__finish -->
            </div>
            <!-- /.workFlow__middle -->

            <div class="workFlow__right">
                <div class="timeLine timeLine--1 is-shown-tab">
                    <img class="timeLine__time timeLine__time--1" src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-0850.png" alt="">
                    <figure class="timeLine__img"><img src="<?php echo wp_get_attachment_url(intval(get_post_meta($setting_page_id, $timeLine_img_1, true))); ?>" alt=""></figure>
                    <div class="timeLine__bodyArea">
                        <h4 class="timeLine__title">出勤</h4>
                        <p class="timeLine__body">
                            荷物や上着をロッカーに入れ、<br class="is-hidden-sp">
                            タイムカードを押して朝礼の準備
                        </p>
                    </div>
                </div>
                <!-- /.timeLine -->
                <div class="timeLine timeLine--2">
                    <img class="timeLine__time timeLine__time--2" src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-0900.png" alt="">
                    <figure class="timeLine__img"><img src="<?php echo wp_get_attachment_url(intval(get_post_meta($setting_page_id, $timeLine_img_2, true))); ?>" alt=""></figure>
                    <div class="timeLine__bodyArea">
                        <h4 class="timeLine__title">朝礼</h4>
                        <p class="timeLine__body">今日１日の確認や注意事項などの共有</p>
                    </div>
                    <figure class="workFlow__deco workFlow__deco--2"><img src='<?php echo get_template_directory_uri(); ?>/images/recruit/work-deco2.png' alt=''></figure>
                </div>
                <!-- /.timeLine -->
                <div class="timeLine timeLine--3 is-shown-tab">
                    <img class="timeLine__time timeLine__time--3" src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-0900-0930.png" alt="">
                    <figure class="timeLine__img"><img src="<?php echo wp_get_attachment_url(intval(get_post_meta($setting_page_id, $timeLine_img_3, true))); ?>" alt=""></figure>
                    <div class="timeLine__bodyArea">
                        <h4 class="timeLine__title">オープン</h4>
                        <p class="timeLine__body">
                            タオルをたたみ、お客様を気持ちよく<br class="is-hidden-sp">
                            迎えられるように隅々まで掃除をします。
                        </p>
                    </div>
                </div>
                <!-- /.timeLine -->
                <div class="timeLine timeLine--4">
                    <img class="timeLine__time timeLine__time--4" src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-0930.png" alt="">
                    <div class="timeLine__bodyArea">
                        <h4 class="timeLine__title">サロンワーク</h4>
                        <p class="timeLine__body">
                            お客様の髪の悩みを共有、改善することで<br class="is-hidden-sp">
                            あなたのファン客にしちゃいましょう。
                        </p>
                    </div>
                    <figure class="workFlow__deco workFlow__deco--3"><img src='<?php echo get_template_directory_uri(); ?>/images/recruit/work-deco3.png' alt=''></figure>
                    <figure class="workFlow__deco workFlow__deco--4"><img src='<?php echo get_template_directory_uri(); ?>/images/recruit/work-deco4.png' alt=''></figure>
                </div>
                <!-- /.timeLine -->
                <div class="timeLine timeLine--5 is-shown-tab">
                    <img class="timeLine__time timeLine__time--5" src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-1230-1330.png" alt="">
                    <figure class="timeLine__img"><img src="<?php echo wp_get_attachment_url(intval(get_post_meta($setting_page_id, $timeLine_img_5, true))); ?>" alt=""></figure>
                    <div class="timeLine__bodyArea">
                        <h4 class="timeLine__title">ランチ</h4>
                        <p class="timeLine__body">
                            予約状況をみながら前もって予約を<br class="is-hidden-sp">
                            空けているので計画的に休憩に入れます。
                        </p>
                    </div>
                </div>
                <!-- /.timeLine -->
                <div class="timeLine timeLine--6">
                    <img class="timeLine__time timeLine__time--6" src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-1530-1600.png" alt="">
                    <figure class="timeLine__img"><img src="<?php echo wp_get_attachment_url(intval(get_post_meta($setting_page_id, $timeLine_img_6, true))); ?>" alt=""></figure>
                    <div class="timeLine__bodyArea">
                        <p class="timeLine__body">
                            予約の隙間時間には、材料の補充や<br class="is-hidden-sp">
                            発注などのサロン業務
                        </p>
                    </div>
                </div>
                <!-- /.timeLine -->
                <div class="timeLine timeLine--7 is-shown-tab">
                    <img class="timeLine__time timeLine__time--7" src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-1730.png" alt="">
                    <figure class="timeLine__img"><img src="<?php echo wp_get_attachment_url(intval(get_post_meta($setting_page_id, $timeLine_img_7, true))); ?>" alt=""></figure>
                    <div class="timeLine__bodyArea">
                        <p class="timeLine__body">すきま時間を利用して徐々に夜掃除開始</p>
                    </div>
                </div>
                <!-- /.timeLine -->
            </div>
            <!-- /.workFlow__right -->
        </div>
        <!-- /.workFlow__wrapper -->
        <div class="workFlow__finish is-shown-tab">
            <figure class="workFlow__finishTime"><img src="<?php echo get_template_directory_uri(); ?>/images/recruit/work-1900.png" alt=""></figure>
            <div class="workFlow__finishBodyArea">
                <h4 class="workFlow__finishTitle">営業終了</h4>
                <p class="workFlow__finishBody">
                    掃除を済ませ、入客していなければ<br>
                    帰宅できます。
                </p>
            </div>
            <!-- /.workFlow__finishBodyArea -->
        </div>
        <!-- /.workFlow__finish is-shown-tab -->
        <figure class="workFlow__deco workFlow__deco--5"><img src='<?php echo get_template_directory_uri(); ?>/images/recruit/work-deco5.png' alt=''></figure>
    </div>
    <!-- /.inner workFlow -->
    <figure class="workFlow__deco workFlow__deco--1"><img src='<?php echo get_template_directory_uri(); ?>/images/recruit/work-deco1.png' alt=''></figure>
</section>
<!-- /.workFlow -->


<section class="skill">
    <div class="skill__titleArea">
        <h2 class="sectionTitle skill__title">Skill Up</h2>
        <p class="sectionSubtitle skill__subtitle">研修会</p>
    </div>
    <div class="skill__container">
        <div class="inner skill__inner">
            <?php
            $args = [
                'page_id' => 630,
                // 'page_id' => 568,
            ];
            $sub_query = new WP_Query($args);
            if ($sub_query->have_posts()) :
                while ($sub_query->have_posts()) :
                    $sub_query->the_post();
            ?>
                    <?php if (!empty(get_the_content())) : ?>
                        <div class="skill__body"><?php the_content(); ?></div>
                    <?php endif; ?>

            <?php endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
        <!-- /.inner skill__inner -->
    </div>
    <!-- /.skill__container -->
    </div>
</section>
<!-- /.skill -->


<section class="shop">
    <div class="inner shop__inner">
        <h2 class="sectionTitle shop__title">Shop</h2>
        <p class="sectionSubtitle shop__subtitle">施設紹介</p>
        <div class="shop__photos">
            <?php
            $args = [
                'page_id' => 625,
                // 'page_id' => 578,
            ];
            $sub_query = new WP_Query($args);
            if ($sub_query->have_posts()) :
                while ($sub_query->have_posts()) :
                    $sub_query->the_post();
            ?>
                    <?php the_content() ?>
            <?php endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
        <!-- /.shop__photos -->
        <a href="<?php home_url(); ?>/salon" class="button shop__button">施設紹介ページ</a>
    </div>
    <!-- /.inner shop__inner -->
</section>
<!-- /.shop -->


<section class="access">
    <div class="access__titleArea">
        <h2 class="sectionTitle access__title">Access</h2>
        <p class="sectionSubtitle access__subtitle">アクセス</p>
    </div>
    <!-- /.access__titleArea -->
    <div class="access__container">
        <div class="inner">
            <?php
            $args = [
                'page_id' => 29,
            ];
            $sub_query = new WP_Query($args);
            if ($sub_query->have_posts()) :
                while ($sub_query->have_posts()) :
                    $sub_query->the_post();
            ?>
                    <?php the_content() ?>
            <?php endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
        <!-- /.access__inner -->
    </div>
    <!-- /.access__container -->
</section>
<!-- /.access -->


<section class="jobDescription">
    <div class="inner">
        <?php echo do_shortcode('[deco_title title="募集要項"]'); ?>
        <?php
        $args = [
            'page_id' => 37,
        ];
        $sub_query = new WP_Query($args);
        if ($sub_query->have_posts()) :
            while ($sub_query->have_posts()) :
                $sub_query->the_post();
        ?>
                <?php the_content() ?>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>

    </div>
    <!-- /.inner -->
</section>
<!-- /.jobDescription -->


<section class="jobApplication">
    <div class="inner jobApplication">
        <?php echo do_shortcode('[deco_title title="応募フォーム"]'); ?>
        <?php echo do_shortcode('[contact-form-7 id="313" title="応募フォーム"]'); ?>
    </div>
    <!-- /.inner jobApplication -->
</section>
<!-- /.jobApplication -->


<?php get_footer(); ?>