<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part("./includes/top"); ?>

        <section>
            <div class="inner">
                <?php the_content() ?>
            </div>
        </section>

        <?php if (is_singular('service')) {
            get_template_part('./includes/service_qa');
        } ?>
<?php
    endwhile;
endif;
?>
<?php get_footer(); ?>