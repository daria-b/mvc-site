<?php

return array(
    // Товар:
    'product/([0-9]+)' => 'product/view/$1', //actionView in ProductController
    // Каталог:
    'catalog' => 'catalog/index', //actionIndex in CatalogController
    // Категория товаров:
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //actionCategory in CatalogController
    'category/([0-9]+)' => 'catalog/category/$1', //actionCategory in CatalogController
    // Корзина:
    'cart/checkout' => 'cart/checkout', // actionAdd in CartController
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController
    'cart/add/([0-9]+)' => 'cart/add/$1', //actionAdd in CartController
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', //actionAddAjax in CartController
    'cart' => 'cart/index', //actionIndex in CartController
    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    // Управление товарами:
    // Управление категориями:
    // Управление заказами:
    // Админпанель:

    // О магазине
    'contacts' => 'site/contact',
    // Главная страница
    'index' => 'site/index', //actionIndex in SiteController

);