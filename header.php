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
    <header>


        <!-- ハンバーガーメニュー用 -->
        <input type="checkbox" name="res" id="burger__switch" class="burger__switch">
        <label for="burger__switch" id="burger__btn" class="burger__btn">
            <span id="burger__line" class="burger__line"></span>
        </label>
        <label for="burger__switch" id="burger__background" class="burger__background"></label>
    
    
    </header>

    <main>