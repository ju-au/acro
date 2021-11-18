</article>

</main>

<footer class="footer">
    
    <?php if (!is_page(29)) : // Accessページ以外にgoogle mapsを表示する ?>
        <iframe class="footer__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.9660661274515!2d139.87052831553115!3d35.65320768020086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60187d5fa9c0e249%3A0xc8f6dc8071f277c2!2z44OY44Ki44O844Op44Km44Oz44K444Ki44Kv44Ot5Y2X6JGb6KW_5bqX!5e0!3m2!1sen!2sau!4v1636347754590!5m2!1sen!2sau" width="1920" height="455" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <?php endif; ?>
    <div class="footer__buttons-tab is-shown-tab">
        <div class="inner">
            <a href="<?php echo esc_url(home_url('/recruit')); ?>" class="fixedLink__recruit">
                <p><span>RECRUIT</span><br>採用情報</p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/footer/arrow-white.png" alt="">
            </a>
            <a href="<?php echo esc_url(home_url('/reserve')); ?>" class="fixedLink__reserve">
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/footer/mail.png" alt="">
                    <p>メールでの<br>ご予約</p>
                </figure>
                <img src="<?php echo get_template_directory_uri(); ?>/images/footer/arrow-black.png" alt="">
            </a>
        </div>
    </div>
    <div class="inner footer__inner">
        <div class="footer__upper">
            <div class="footer__info">
                <a class="footer__logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt=""></a>
                <p class="footer__address">
                    〒134-0085<br>
                    東京都江戸川区南葛西2-1-9<br>
                    03-6808-6614
                </p>
                <p class="footer__hours">
                    各種キャッシュレス決済OK<br>
                    <?php echo 'OPEN：' . get_post_meta(39, '開店時間', true) . '～' . get_post_meta(39, '閉店時間', true); ?><br>
                    <?php echo '定休：' . get_post_meta(39, '定休日', true); ?>
                </p>
            </div>
            <!-- /.footer__info -->
            <a class="footer__insta" href=""><img src="<?php echo get_template_directory_uri(); ?>/images/footer/insta.png" alt=""></a>
        </div>
        <!-- /.footer__upper -->

        <div class="footer__lower">
            <?php
            $page_id = 41;
            $page = get_post($page_id);
            echo $page->post_content;
            ?>
            <nav class="footer__nav">
                <ul class="footer__navItems">
                    <li class="footer__navItem"><a href="<?php echo esc_url(home_url()); ?>">ホーム</a></li>
                </ul>
                <ul class="footer__navItems">
                    <li class="footer__navItem"><a href="<?php echo esc_url(home_url('/menu')); ?>">メニュー・料金</a></li>
                </ul>
                <ul class="footer__navItems">
                    <li class="footer__navItem"><a href="<?php echo esc_url(home_url('/identity')); ?>">こだわり</a></li>
                </ul>
                <ul class="footer__navItems">
                    <li class="footer__navItem"><a href="<?php echo esc_url(home_url('/salon')); ?>">店舗紹介</a></li>
                </ul>
                <ul class="footer__navItems">
                    <li class="footer__navItem"><a href="<?php echo esc_url(home_url('/stylists')); ?>">スタッフ紹介</a></li>
                </ul>
                <ul class="footer__navItems">
                    <li class="footer__navItem"><a href="<?php echo esc_url(home_url('/gallery')); ?>">ギャラリー</a></li>
                </ul>
                <ul class="footer__navItems">
                    <li class="footer__navItem"><a href="<?php echo esc_url(home_url('/access')); ?>">アクセス</a></li>
                </ul>
                <ul class="footer__navItems">
                    <li class="footer__navItem"><a href="<?php echo esc_url(home_url('/qa')); ?>">Q&A</a></li>
                </ul>
                <ul class="footer__navItems">
                    <li class="footer__navItem"><a href="<?php echo esc_url(home_url('/reserve')); ?>">お問い合わせ</a></li>
                </ul>
                <ul class="footer__navItems">
                    <li class="footer__navItem"><a href="<?php echo esc_url(home_url('/recruit')); ?>">採用情報</a></li>
                </ul>
                <ul class="footer__navItems">
                    <li class="footer__navItem"><a href="<?php echo esc_url(home_url('/')); ?>">プライバシーポリシー</a></li>
                </ul>
            </nav>
        </div>
        <!-- /.footer__lower -->
        <p class="footer__copyright">&copy; 2021 Hair Lounge ACRO Minami-Kasai</p>
    </div>
    <!-- /.inner footer__inner -->
</footer>


<nav class="fixedLink">
    <a href="<?php echo esc_url(home_url('/recruit')); ?>" class="fixedLink__recruit is-hidden-tab">
        <p>
            <taban>RECRUIT</taban><br>採用情報
        </p>
        <img src="<?php echo get_template_directory_uri(); ?>/images/footer/arrow-white.png" alt="">
    </a>
    <a href="<?php echo esc_url(home_url('/reserve')); ?>" class="fixedLink__reserve is-hidden-tab">
        <figure>
            <img src="<?php echo get_template_directory_uri(); ?>/images/footer/mail.png" alt="">
            <p>メールでの<br>ご予約</p>
        </figure>
        <img src="<?php echo get_template_directory_uri(); ?>/images/footer/arrow-black.png" alt="">
    </a>
    <div id="fixedLink__toTop" class="fixedLink__toTop">
        <img src="<?php echo get_template_directory_uri(); ?>/images/footer/to-top.png" alt="">
    </div>
</nav>


<script src="<?php echo get_template_directory_uri(); ?>/js/plugins/swiper/swiper-bundle.min.js"></script>
<script type="module" src="<?php echo get_template_directory_uri(); ?>/index.js"></script>

<?php wp_footer(); ?>

</body>

</html>