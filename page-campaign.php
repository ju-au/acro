<?php get_header(); ?>

<article>
    <h1 class="pageTitle campaignPage__title">CAMPAIGN</h1>
    <p class="pagSubtitle campaignPage__subtitle">キャンペーン</p>

    <section class="campaign">
        <?php
        $args = array(
            'post_type' => 'post',
            'status' => 'publish',
            'orderby' => array('date' => 'DES'),
        );
        $sub_query = new WP_Query($args);
        if ($sub_query->have_posts()) : while ($sub_query->have_posts()) : $sub_query->the_post();
        ?>
                <div class="campaign__contents">
                    <h2 class="campaign__title"><?php the_title(); ?></h2>
                    <figure class="campaign__thumb">
                        <?php the_post_thumbnail('medium', true); ?>
                    </figure>
                    <?php
                    $campaignPeriod = get_post_meta(get_the_ID(), 'キャンペーン期間', true);
                    $setPrice = get_post_meta(get_the_ID(), 'セット価格', true);
                    if ($campaignPeriod) {
                        echo '<p class="campaign__date">期間&nbsp;&nbsp;' . $campaignPeriod . '</p>';
                    };
                    if ($setPrice) {
                        echo '<p class="campaign__date">セット価格&nbsp;&nbsp;' . $setPrice . '</p>';
                    };
                    
                    $content_string = get_the_content();
                    $content_string = str_replace('<p', '<p class="campaign__body" ', $content_string);
                    echo $content_string;
                    ?>
                </div>
        <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
        <a href="<?php echo esc_url(home_url('/reserve')); ?>" class="button campaign__button">ご予約・お問い合わせ</a>
    </section>
</article>
<?php get_footer(); ?>