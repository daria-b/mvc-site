<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/css/about-styles.css">
    <link rel="stylesheet" href="/template/css/style.css">
    <link rel="stylesheet" href="/template/css/style-new.css">

    <meta charset="utf-8">
    <title>TechnoShop</title>

</head>

<body>

<div id="top-line"></div>

<div id="header">

    <a href="/" id="logo"></a>

    <div id="top-menu">

        <ul class="nav navbar-nav collapse navbar-collapse">
            <li><a href="/">Главная</a></li>
            <li class="dropdown"><a href="/catalog/">Товары<i class="fa fa-angle-down"></i></a>
                <ul class="sub-menu">

                    <?php foreach($categories as $categoryItem): ?>
                    <li><a href="/category/<?php echo $categoryItem['id']; ?>">
                            <?php echo $categoryItem['name']; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </li>
            <li><a href="/about/">О магазине</a></li>
            <li><a href="/contacts/">Контакты</a></li>

            <?php if (User::isGuest()): ?>
            <li class="dropdown"><a href="/user/login/">
                    Учетная запись<i class="fa fa-angle-down"></i></a>
            <?php else: ?>
            <li class="dropdown"><a href="/cabinet/">
                    Учетная запись<i class="fa fa-angle-down"></i></a>
            <?php endif; ?>

                <ul class="sub-menu">
                    <?php if (User::isGuest()): ?>
                        <li><a href="/user/login/">Вход</a></li>
                        <li><a href="/user/register/">Регистрация</a></li>
                    <?php else: ?>
                        <li><a href="/cabinet/">Профиль</a></li>
                        <li><a href="/user/logout/">Выход</a></li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>

    </div>

    <div id="search">
        <form name="" action="http://www.technoshop.ho.ua/search/" method="get" id="search-form">
            <input type="text" name="query" placeholder="Поиск по товарам">
            <input type="submit" name="" value=" ">
        </form>

    </div>

    <a href="/cart/" id="cart-btn">Корзина
        <span id="cart-count">(<?php echo Cart::countItems(); ?>)</span>
    </a>

</div>