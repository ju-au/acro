<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php get_template_part('./includes/top'); ?>
        <div class="inner">
            <?php the_content(); ?>

        </div>

<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>