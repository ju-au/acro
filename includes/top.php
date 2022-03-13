<?php
$thumbnail_id = get_post_thumbnail_id();
$eye_img = wp_get_attachment_image_src($thumbnail_id, 'full');
if ($eye_img) {
    echo '<section class="pageTop" style="background-image: url(' . $eye_img[0] . ');">';
} else {
    echo '<section class="pageTop">';
};
?>
<div class="inner">
    <h1 class="pageTop__title"><?php the_title(); ?></h1>
    <p class="pageTop__subtitle"><?php echo get_post_meta(get_the_ID(), 'pageSubtitle', true); ?></p>
    <p class="pageTop__message"><?php echo get_post_meta(get_the_ID(), 'ページトップ説明文', true); ?></p>
</div>
</section>