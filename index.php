<?php get_header(); ?>

<section class="topCampaign">
    <div class="inner topCampaign__inner">
        <h2 class="sectionTitle topCampaign__title" lang="en">\ \ \&nbsp;&nbsp;TOPIC&nbsp;&nbsp;\ \ \</h2>
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
            <a class="button topCampaign__button" href="">詳細・その他のキャンペーン</a>

    </div>
    <!-- /.topCampaign__inner -->
</section>




<?php get_footer(); ?>