    <section class="pageTitle" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/page-title-bg.png);">
        <div class="pageTitle__inner">
            <?php if (is_author()) :
                $user_id = get_the_author_meta('ID');
            ?>
                <h1 class="pageTitle__title"><?php echo get_user_meta($user_id, 'job-title', true); ?></h1>
                <p class="pageTitle__subTitle"><?php echo get_user_meta($user_id, 'nickname', true); ?></p>
            <?php else : ?>
                <h1 class="pageTitle__title"><?php the_title(); ?></h1>
                <p class="pageTitle__subTitle"><?php echo get_post_meta(get_the_ID(), 'pageSubtitle', true); ?></p>
            <?php endif; ?>
        </div>
    </section>