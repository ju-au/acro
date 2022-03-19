<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('./includes/top'); ?>


        <section class="menuDetail">
            <div class="inner">
                <?php the_content() ?>
            </div>
        </section>


        <section class="flow">
            <div class="inner">
                <?php
                    if ($is_title) :
                ?>
                        <div class="flow__step">
                            <p class="flow__number"><span>STEP</span><?php echo '0' . $i; ?></p>
                            <h3 class="flow__title"><?php echo $is_title ?></h3>
                            <figure class="flow__img">
                                <img src="<?php echo wp_get_attachment_url($img_id, 'medium', true); ?>" alt="">
                            </figure>
                            <p class="flow__body"><?php echo get_post_meta($page_id, $body, true); ?></p>
                        </div>
                <?php
                    endif;
                endfor;
                ?>
            </div>
        </section>


        <section class="menuDetail__qa">
            <div class="inner">
                <h2 class="sectionTitle menuDetail__qaTitle">よくある質問</h2>
                <?php echo do_shortcode('[ultimate-faqs include_category=’color-page’]'); ?>
                <a class="button menuDetail_toQa" href="<?php echo esc_url(home_url('/qa')); ?>">その他のQ&A</a>
            </div>
            <a class="button menuDetail__toReserve" href="<?php echo esc_url(home_url('/reserve')); ?>">ご予約・お問い合わせ</a>

        </section>

<?php
    endwhile;
endif;
?>
<?php get_footer(); ?>