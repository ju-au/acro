<!doctype html>
<html lang="ja">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
    <header class="header">
        <div class="header__left">
            <p class="header__title">葛西 南葛西の美容室 ヘアーラウンジアクロ南葛西店</p>
            <img class="header__logo" src="<?php echo get_template_directory_uri(); ?>/images/header/logo.png" alt="">
        </div>
        <!-- /.header__left -->

        <div class="header__right">
            <div class="header__info">
                <div class="header__phone">
                    <p class="header__phoneTitle">ご予約・お問い合わせ</p>
                    <p class="header__phoneNumber">03-6808-6614</p>
                </div>
                <div class="header__hours">
                    <p class="header__notice">【予約優先】各種キャッシュレス決済OK</p>
                    <p class="header__opening"><?php echo 'OPEN：' . get_post_meta(39, '開店時間', true) . '～' . get_post_meta(39, '閉店時間', true); ?></p>
                    <p class="header__closure"></p><?php echo '定休：' . get_post_meta(39, '定休日', true); ?>
                </div>
            </div>
            <!-- /.header__info -->
            <nav class="header__nav burger__nab">
                <ul class="header__navItems">
                    <li class="header__navItem">
                        <a href="">
                            <p class="header__navItem--en">HOME</p>
                            <p class="header__navItem--jp">ホーム</p>
                        </a>
                    </li>
                    <li class="header__navItem">
                        <a href="">
                            <p class="header__navItem--en">MENU</p>
                            <p class="header__navItem--jp">メニュー・料金</p>
                        </a>
                    </li>
                    <li class="header__navItem">
                        <a href="">
                            <p class="header__navItem--en">IDENTITY</p>
                            <p class="header__navItem--jp">こだわり</p>
                        </a>
                    </li>
                    <li class="header__navItem">
                        <a href="">
                            <p class="header__navItem--en">SALON</p>
                            <p class="header__navItem--jp">店舗紹介</p>
                        </a>
                    </li>
                    <li class="header__navItem">
                        <a href="">
                            <p class="header__navItem--en">STYLIST</p>
                            <p class="header__navItem--jp">スタッフ紹介</p>
                        </a>
                    </li>
                    <li class="header__navItem">
                        <a href="">
                            <p class="header__navItem--en">GALLERY</p>
                            <p class="header__navItem--jp">ギャラリー</p>
                        </a>
                    </li>
                    <li class="header__navItem">
                        <a href="">
                            <p class="header__navItem--en">ACCESS</p>
                            <p class="header__navItem--jp">アクセス</p>
                        </a>
                    </li>
                    <li class="header__navItem">
                        <a href="">
                            <p class="header__navItem--en">Q&A</p>
                            <p class="header__navItem--jp">よくある質問</p>
                        </a>
                    </li>
                </ul>
                <!-- ハンバーガーメニュー用 -->
                <!-- <input type="checkbox" name="res" id="burger__switch" class="burger__switch">
                <label for="burger__switch" id="burger__btn" class="burger__btn">
                    <span id="burger__line" class="burger__line"></span>
                </label>
                <label for="burger__switch" id="burger__background" class="burger__background"></label> -->
                <!-- /ハンバーガーメニュー用 -->
            </nav>
            <!-- /.header__nav burger__nab -->
        </div>
        <!-- /.header__right -->

    </header>

    <main>