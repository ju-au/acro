<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
        $top_part = "";
        if (is_page(31)) {
            $top_part = "./includes/page-title";
        } else {
            $top_part = "./include/top";
        }
        get_template_part($top_part); ?>
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