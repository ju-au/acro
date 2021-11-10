<?php get_header(); ?>

<section class="fv">
    <!-- Slider main container -->
    <div class="swiper fv-swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper fv-swiper-wrapper">
            <h2 class="fv__copy">美と安ら<span class="color-white">ぎを</span><br>
                いつもの<span class="color-white">オーガニックサロンで</span></h2>
            <!-- Slides -->
            <div class="swiper-slide fv-swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/images/index/fv1.jpg" alt=""></div>
            <!-- <div class="swiper-slide fv-swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/images/index/fv1.jpg" alt=""></div> -->
            <!-- <div class="swiper-slide fv-swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/images/index/fv1.jpg" alt=""></div> -->
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination fv-swiper-pagination"></div>

    </div>
</section>



<section class="topCampaign">
    <div class="inner topCampaign__inner">
        <h2 class="sectionTitle topCampaign__title" lang="en">TOPIC</h2>
        <div class="topCampaign__cards">
            <?php
            $args = array(
                'post_type' => 'post',
                'category_name' => 'shown-on-top-page',
                'posts_per_page' => 2,
                'orderby' => array('date' => 'DES'),
            );
            $sub_query = new WP_Query($args);
            if ($sub_query->have_posts()) : while ($sub_query->have_posts()) : $sub_query->the_post();
            ?>
                    <div class="topCampaign__card">
                        <div class="topCampaign__cardImg"><?php the_post_thumbnail('small', array('class' => 'topCampaign__cardImg')); ?></div>
                        <div class="topCampaign__textArea">
                            <h3 class="topCampaign__cardTitle"><?php the_title(); ?></h3>
                            <p class="topCampaign__cardBody"><?php echo mb_substr(get_the_excerpt(), 0, 100); ?></p>
                            <span class="topCampaign__cardDate"><?php echo $sub_query->post->キャンペーン期間; ?></span>
                        </div>
                    </div>
                    <!-- /.topCampaign__card -->
            <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <!-- /.topCampaign__cards -->
    </div>
    <!-- /.topCampaign__inner -->
    <a class="button topCampaign__button" href="">詳細・その他のキャンペーン</a>
</section>
<!-- /.topCampaign -->


<section class="topMenu">
    <div class="inner topMenu__inner">
        <h2 class="sectionTitle topMenu__title" lang="en">MENU</h2>
        <ul class="topMenu__cards">
            <li class="topMenu__card">
                <figure class="topMenu__img">
                    <img src="" alt="">
                </figure>
                <div class="topMenu__textArea">
                    <h3 class="topMenu__cardTitle"><span class="topMenu__cardTitle--en">Color&nbsp;</span>カラー</h3>
                    <p class="topMenu__body"><?php echo get_post_meta(60, 'カラー説明文', true); ?></p>
                    <a href="" class="topMenu__link">
                        <p>￥<span class="topMenu__price"><?php echo get_post_meta(60, 'カラー料金', true) . "~"; ?></span></p>
                    </a>
                </div>
            </li>
            <li class="topMenu__card">
                <figure class="topMenu__img">
                    <img src="" alt="">
                </figure>
                <div class="topMenu__textArea">
                    <h3 class="topMenu__cardTitle"><span class="topMenu__cardTitle--en">Perm&nbsp;</span>パーマ</h3>
                    <p class="topMenu__body"><?php echo get_post_meta(60, 'パーマ説明文', true); ?></p>
                    <a href="" class="topMenu__link">
                        <p>￥<span class="topMenu__price"><?php echo get_post_meta(60, 'パーマ料金', true) . "~"; ?></p></span>
                    </a>
                </div>
            </li>
            <li class="topMenu__card">
                <figure class="topMenu__img">
                    <img src="" alt="">
                </figure>
                <div class="topMenu__textArea">
                    <h3 class="topMenu__cardTitle"><span class="topMenu__cardTitle--en">Hair Straightening&nbsp;</span>縮毛矯正</h3>
                    <p class="topMenu__body"><?php echo get_post_meta(60, '縮毛矯正説明文', true); ?></p>
                    <a href="" class="topMenu__link">
                        <p>￥<span class="topMenu__price"><?php echo get_post_meta(60, '縮毛矯正料金', true) . "~"; ?></p></span>
                    </a>
                </div>
            </li>
            <li class="topMenu__card">
                <figure class="topMenu__img">
                    <img src="" alt="">
                </figure>
                <div class="topMenu__textArea">
                    <h3 class="topMenu__cardTitle"><span class="topMenu__cardTitle--en">Treatment&nbsp;</span>トリートメント</h3>
                    <p class="topMenu__body"><?php echo get_post_meta(60, 'トリートメント説明文', true); ?></p>
                    <a href="" class="topMenu__link">
                        <p>￥<span class="topMenu__price"><?php echo get_post_meta(60, 'トリートメント料金', true) . '~'; ?></p></span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <!-- /.topMenu__inner -->
    <a class="button topMenu__button" href="">メニュー・料金</a>
</section>
<!-- /.topMenu -->


<section class="topStylist">
    <div class="inner topStylist__inner">
        <h2 class="sectionTitle topStylist__title">STYLIST</h2>
        <dl class="topStylist__cards">
            <?php
            $users = get_users(array(
                'number' => 3,
                'meta_key' => 'main-creator',
                'meta_value' => 1,
            ));

            foreach ($users as $user) :
                $uid = $user->ID;
            ?>
                <dd class="topStylist__card">
                    <figure class="topStylist__img">
                        <?php echo get_avatar($uid, 300); ?>
                    </figure>
                    <p class="topStylist__name"><span class="topStylist__jobTitle"><?php echo get_user_meta($uid, 'job-title', true); ?></span><?php echo get_user_meta($uid, 'nickname', true); ?></p>
                </dd>

            <?php endforeach; ?>
        </dl>
        <a href="" class="button topStylist_button">出勤日・他のスタッフ</a>
    </div>
    <!-- /.inner topStylist__inner -->
</section>
<!-- /.topStylist -->


<section class="topGallery">
<div class="inner topGallery__inner">
    <h2 class="sectionTitle topGallery__title">GALLERY</h2>

    <?php echo do_shortcode('[instagram-feed num=3 cols=3 imageres=small showheader=false showfollow=false showbutton=false imagepadding=15]'); ?>
</div>
<!-- /.inner topGallery__inner -->
<a href="" class="button topGallery__button">ギャラリーページ</a>
</section>
<!-- /.topGallery -->

<?php get_footer(); ?>