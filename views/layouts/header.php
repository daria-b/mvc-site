<!doctype html>
<html>

<head>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="/PHP/site/template/css/rozetka-styles.css">
    <link rel="stylesheet" href="/PHP/site/template/css/style.css">
    <link rel="stylesheet" href="/PHP/site/template/css/style-new.css">


    <meta charset="utf-8">
    <title>TechnoShop</title>

</head>

<body>

<div id="top-line"></div>

<div id="header">

    <a href="/php/site/index/" id="logo"></a>

    <div id="top-menu">

        <ul class="nav navbar-nav collapse navbar-collapse">
            <li><a href="/php/site/index/">Главная</a></li>
            <li class="dropdown"><a href="/php/site/catalog/">Товары<i class="fa fa-angle-down"></i></a>
                <ul class="sub-menu">

                    <?php foreach($categories as $categoryItem): ?>
                    <li><a href="/php/site/category/<?php echo $categoryItem['id']; ?>">
                            <?php echo $categoryItem['name']; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </li>
            <li><a href="/php/site/about/">О магазине</a></li>
            <li><a href="/php/site/contacts/">Контакты</a></li>

            <?php if (User::isGuest()): ?>
            <li class="dropdown"><a href="/php/site/user/login/">
                    Учетная запись<i class="fa fa-angle-down"></i></a>
            <?php else: ?>
            <li class="dropdown"><a href="/php/site/cabinet/">
                    Учетная запись<i class="fa fa-angle-down"></i></a>
            <?php endif; ?>

                <ul class="sub-menu">
                    <?php if (User::isGuest()): ?>
                        <li><a href="/php/site/user/login/">Вход</a></li>
                        <li><a href="/php/site/user/register/">Регистрация</a></li>
                    <?php else: ?>
                        <li><a href="/php/site/cabinet/">Профиль</a></li>
                        <li><a href="/php/site/user/logout/">Выход</a></li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>

    </div>

    <div id="search">
        <form method="" action="" id="search-form">
            <input type="text" name="" value="Поиск по товарам">
            <input type="submit" name="" value=" ">
        </form>
    </div>

    <a href="/php/site/cart/" id="cart-btn">Корзина
        <span id="cart-count">(<?php echo Cart::countItems(); ?>)</span>
    </a>

</div>