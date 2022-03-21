    <section class="pageTitle" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/page-title-bg.png);">
        <div class="pageTitle__inner">
            <h1 class="pageTitle__title"><?php the_title(); ?></h1>
            <p class="pageTitle__subTitle"><?php echo get_post_meta(get_the_ID(), 'pageSubtitle', true); ?></p>
        </div>
    </section>