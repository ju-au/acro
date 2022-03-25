<?php get_header(); ?>

<section class="fv">
    <h2 class="fv__copy">
        <img src="<?php echo get_template_directory_uri(); ?>/images/index/fv-deco.png" alt="">
    </h2>
    <div class="inner fv__inner">
        <div class="swiper fv__swiper">
            <div class="swiper-wrapper fv-swiper-wrapper">
                <?php
                $fv_images = get_post_meta(319, 'First View Image', false);
                foreach ($fv_images as $image) :
                ?>
                    <div class="swiper-slide fv-swiper-slide"><img src="<?php echo wp_get_attachment_url($image); ?>" alt=""></div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination fv-swiper-pagination"></div>

        </div>
    </div>
    <!-- /.fv__container -->
</section>



<section class="topCampaign" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/index/bg-pattern1.png);">
    <div class="inner topCampaign__inner">
        <h2 class="sectionTitle topCampaign__title">Topic</h2>
        <div class="topCampaign__card-wrapper" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/index/bg-pattern2.png);">
            <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'meta_key' => 'Topページに表示',
                'meta_value' => '1',
            );
            $sub_query = new WP_Query($args);
            if ($sub_query->have_posts()) : while ($sub_query->have_posts()) : $sub_query->the_post();
            ?>
                    <div class="topCampaign__card">
                        <figure class="topCampaign__cardImg"><?php the_post_thumbnail('small'); ?></figure>
                        <div class="topCampaign__textArea">
                            <div class="topCampaign__text-upper">
                                <h3 class="topCampaign__cardTitle"><?php the_title(); ?></h3>
                                <p class="topCampaign__cardBody"><?php echo mb_substr(get_the_excerpt(), 0, 200); ?></p>
                            </div>
                            <!-- /.topCampaign__text-upper -->
                            <span class="topCampaign__cardDate"><?php echo $sub_query->post->キャンペーン期間; ?></span>
                        </div>
                    </div>
                    <!-- /.topCampaign__card -->
                <?php
                endwhile;
            else :
                ?>
                <div class="topCampaign__card">現在トピックはありません</div>

            <?php
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <!-- /.topCampaign__cards -->
    </div>
    <!-- /.topCampaign__inner -->
    <a class="button topCampaign__button" href="<?php echo esc_url(home_url('/campaign')); ?>">詳細・その他のキャンペーン</a>
    <figure class="topCampaign__deco1"><img src="<?php echo get_template_directory_uri(); ?>/images/index/campaign-deco1.png" alt=""></figure>
    <figure class="topCampaign__deco2"><img src="<?php echo get_template_directory_uri(); ?>/images/index/campaign-deco2.png" alt=""></figure>
</section>
<!-- /.topCampaign -->


<section class="topMenu">
    <div class="inner topMenu__inner">
        <h2 class="sectionTitle topMenu__title" lang="en">Pick up menu</h2>
        <ul class="topMenu__cards">
            <?php
            $args = [
                'post_type' => 'service',
                'post_status' => 'publish',
                'meta_key' => 'トップページ：表示順',
                'orderby' => ['meta_value_num' => 'ASC', 'date' => 'DECS'],
            ];
            $sub_query = new WP_Query($args);
            if ($sub_query->have_posts()) :
                while ($sub_query->have_posts()) :
                    $sub_query->the_post();
                    $img_id = get_post_meta(get_the_ID(), 'トップページ：画像', true);
                    $img_url = wp_get_attachment_image_src($img_id, 'full');
            ?>

                    <li class="topMenu__card">
                        <figure class="topMenu__img">
                            <img src="<?php echo $img_url[0]; ?>" alt="">
                        </figure>
                        <div class="topMenu__textArea">
                            <h3 class="topMenu__cardTitle"><span class="topMenu__cardTitle--en"><?php the_title(); ?></span>&nbsp;&nbsp;<?php echo get_post_meta(get_the_id(), 'pageSubtitle', true); ?></h3>
                            <p class="topMenu__body"><?php echo get_post_meta(get_the_ID(), 'トップページ：説明文', true); ?></p>
                            <a class="topMenu__link" href="<?php echo get_permalink(); ?>">
                                <p><?php echo get_post_meta(get_the_id(), 'トップページ：料金', true); ?></p>
                            </a>
                        </div>
                    </li>

            <?php endwhile;
            endif;
            wp_reset_postdata(); ?>

        </ul>
    </div>
    <!-- /.topMenu__inner -->
    <a class="button topMenu__button" href="<?php echo esc_url(home_url('/menu')); ?>">メニュー・料金</a>
</section>
<!-- /.topMenu -->


<section class="topStylist">
    <div class="inner topStylist__inner">
        <h2 class="sectionTitle topStylist__title">Stylist</h2>
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
                    <p class="topStylist__name"><span class="topStylist__jobTitle"><?php echo get_user_meta($uid, 'job-title', true); ?></span><br class="is-shown-tab-only"><?php echo get_user_meta($uid, 'nickname', true); ?></p>
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
        <h2 class="sectionTitle topGallery__title">Gallery</h2>

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
        <div class="inner topColona__inner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/index/bg-pattern2.png);">
            <div class="topColona__contentsWrapper">
                <figure class="topColona__thumb is-shown-sp">
                    <img src="<?php echo $thumbnail_src[0] ?>" alt="">
                </figure>
                <h2 class="topColona__title">コロナウイルス感染防止対策</h2>
                <div class="topColona__contents">
                    <div class="topColona__body"><?php echo $page->post_content; ?></div>
                    <figure class="topColona__thumb is-hidden-sp">
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
                <figure class="topColona__deco"><img src="<?php echo get_template_directory_uri(); ?>/images/index/colona-deco.png" alt=""></figure>

            </div>
            <!-- /.topColona__contentsWrapper -->
        </div>
        <!-- /.inner topColona__inner -->
        <p class="topColona__message">まずはお気軽にご相談ください</p>
        <a class="button topColona__button" href="<?php echo esc_url(home_url('/reserve')); ?>">ご予約・お問い合わせ</a>
    </section>
    <!-- /.topColona -->

<?php endif; ?>

<?php get_footer(); ?>