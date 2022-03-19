<?php
$slug = $post->post_name;
$slug .= '-page'
?>

<section class="serviceQA">
    <div class="inner">
        <?php echo do_shortcode("[deco_title title='よくある質問']"); ?>
        <?php echo do_shortcode("[ultimate-faqs include_category=$slug]"); ?>
        <a class="button service__button" href="../../qa">その他のQ&A</a>
    </div>
    <!-- /.inner -->
    <a class="button" href="../../identity">アクロのこだわり</a>
</section>