<?php get_header(); ?>

<section class="fv">
    <h2 class="fv__copy">
        美と<span class="color-white-sp">安ら</span><span class="color-white">ぎを</span><br>
        いつ<span class="color-white-sp">もの</span><span class="color-white">オーガニックサロンで</span>
    </h2>
    <!-- Slider main container -->
    <div class="swiper fv-swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper fv-swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide fv-swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/images/index/fv1.jpg" alt=""></div>
            <div class="swiper-slide fv-swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/images/index/colona1.png" alt=""></div>
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
    <a class="button topCampaign__button" href="<?php echo esc_url(home_url('/campaign')); ?>">詳細・その他のキャンペーン</a>
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
                    <a class="topMenu__link" href="<?php echo esc_url(home_url('/color')); ?>">
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
                    <a href="<?php echo esc_url(home_url('/perm')); ?>" class="topMenu__link">
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
                    <a href="<?php echo esc_url(home_url('/hair-straightening')); ?>" class="topMenu__link">
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
                    <a href="<?php echo esc_url(home_url('/treatment')); ?>" class="topMenu__link">
                        <p>￥<span class="topMenu__price"><?php echo get_post_meta(60, 'トリートメント料金', true) . '~'; ?></p></span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <!-- /.topMenu__inner -->
    <a class="button topMenu__button" href="<?php echo esc_url(home_url('/menu')); ?>">メニュー・料金</a>
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
        <a href="<?php echo esc_url(home_url('/stylist')); ?>" class="button topStylist_button">出勤日・他のスタッフ</a>
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
    <a href="<?php echo esc_url(home_url('/gallery')); ?>" class="button topGallery__button">ギャラリーページ</a>
</section>
<!-- /.topGallery -->


<?php
// コロナ対策セクション
$page_id = 66;
// カスタムフィールド「Topページに表示」に「1」が入力されている時のみ表示する
$shown_on_top_page = get_post_meta($page_id, 'Topページに表示', true);
if ($shown_on_top_page === "1") :
    $page = get_post($page_id);
    $thumbnail_id = get_post_thumbnail_id($page_id);
    $thumbnail_src = wp_get_attachment_image_src($thumbnail_id, 'full', true);
    // カスタムフィールドで設定したアイコンの画像IDを取得
    $icon_ids = array();
    for ($i = 1; $i <= 3; $i++) {
        $icon_no = 'アイコン' . $i;
        $icon_id = get_post_meta($page_id, $icon_no, true);
        array_push($icon_ids, $icon_id);
    };
?>

    <section class="topColona">
        <div class="inner topColona__inner">
            <div class="topColona__contentsWrapper">
                <h2 class="topColona__title">コロナウイルス感染防止対策</h2>
                <div class="topColona__contents">
                    <div class="topColona__body"><?php echo $page->post_content; ?></div>
                    <figure class="topColona__thumb">
                        <img src="<?php echo $thumbnail_src[0] ?>" alt="">
                    </figure>
                    <figure class="topColona__icons">
                        <?php
                        // アイコンを表示
                        foreach ($icon_ids as $id) :
                            $icon_src = wp_get_attachment_image_src($id, 'full', true);
                        ?>
                            <img src="<?php echo $icon_src[0]; ?>" alt="">
                        <?php endforeach; ?>
                    </figure>
                </div>
                <!-- /.topColona__contents -->
            </div>
            <!-- /.topColona__contentsWrapper -->
        </div>
        <!-- /.inner topColona__inner -->
        <p class="topColona__message">まずはお気軽にご相談ください</p>
        <a href="<?php echo esc_url(home_url('/reserve')); ?>" class="button topColona__button">ご予約・お問い合わせ</a>
    </section>
    <!-- /.topColona -->

<?php endif; ?>

<?php get_footer(); ?>