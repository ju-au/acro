<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('./includes/top'); ?>
        <section>
            <div class="inner">
                <?php the_content() ?>
            </div>
        </section>

<?php
    endwhile;
endif;
?>
<?php get_footer(); ?>