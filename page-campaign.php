<?php get_header(); ?>

<article>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php get_template_part('./includes/page-title'); ?>

            <section class="campaign">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'status' => 'publish',
                    'orderby' => array('date' => 'DES'),
                );
                $sub_query = new WP_Query($args);
                if ($sub_query->have_posts()) : while ($sub_query->have_posts()) : $sub_query->the_post();
                        // キャンペーンのスタイル切り替え用のフラグ  カスタムフィールド「特別なスタイル」で設定
                        $campaignFlag = (get_post_meta(get_the_ID(), '特別なスタイル', true) === '1') ? 1 : "";
                        $campaignClass = ($campaignFlag === 1) ? " campaign__contents--special" : "";
                ?>
                        <div class="campaign__contents<?php echo $campaignClass ?>">
                            <div class="inner campaign__inner">
                                <?php if ($campaignFlag === 1) : ?>
                                    <h2 class="campaign__title"><?php the_title(); ?></h2>
                                <?php else : ?>
                                    <?php echo do_shortcode('[deco_title title="' . get_the_title() . '"]'); ?>
                                <?php endif; ?>
                                <div class="campaign__left">
                                    <figure class="campaign__img">
                                        <?php the_post_thumbnail('full'); ?>
                                    </figure>
                                    <?php
                                    $campaignPeriod = get_post_meta(get_the_ID(), 'キャンペーン期間', true);
                                    $setPrice = get_post_meta(get_the_ID(), 'セット価格', true);
                                    if ($campaignPeriod) {
                                        echo '<p class="campaign__date">期間：' . $campaignPeriod . '</p>';
                                    };
                                    if ($setPrice) {
                                        echo '<p class="campaign__date">セット価格&nbsp;&nbsp;' . $setPrice . '</p>';
                                    }; ?>
                                </div>
                                <!-- /.campaign__left -->
                                <div class="campaign__right">
                                    <?php
                                    echo the_content();
                                    ?>

                                </div>
                                <!-- /.campaign__right -->
                            </div>
                            <!-- /.inner campaign__inner -->
                        </div>
                        <!-- /.campaign__contents -->
                <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
                <a href="<?php echo esc_url(home_url('/reserve')); ?>" class="button campaign__button">ご予約・お問い合わせ</a>
            </section>
</article>
<?php
        endwhile;
    endif;
    wp_reset_postdata();
?>

<?php get_footer(); ?>