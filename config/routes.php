<?php

return array(

    // Поиск
    'search' => 'site/search',
    // Комментарии
    'message/page-([0-9]+)' => 'site/message/$1',
    'message' => 'site/message',

    // Товар:
    'product/([0-9]+)' => 'product/view/$1', //actionView in ProductController
    // Каталог:
    'catalog/pricedown/page-([0-9]+)' => 'catalog/pricedown/$1', //actionPricedown in CatalogController
    'catalog/pricedown' => 'catalog/pricedown', //actionPricedown in CatalogController

    'catalog/priceup/page-([0-9]+)' => 'catalog/priceup/$1', //actionPricedown in CatalogController
    'catalog/priceup' => 'catalog/priceup', //actionPricedown in CatalogController

    'catalog/namedown/page-([0-9]+)' => 'catalog/namedown/$1', //actionPricedown in CatalogController
    'catalog/namedown' => 'catalog/namedown', //actionPricedown in CatalogController

    'catalog/nameup/page-([0-9]+)' => 'catalog/nameup/$1', //actionPricedown in CatalogController
    'catalog/nameup' => 'catalog/nameup', //actionPricedown in CatalogController

    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog' => 'catalog/index', //actionIndex in CatalogController
    // Категория товаров:
    'category/([0-9]+)/pricedown/page-([0-9]+)' => 'catalog/categorypricedown/$1/$2', //actionCategory in CatalogController
    'category/([0-9]+)/pricedown' => 'catalog/categorypricedown/$1', //actionCategory in CatalogController

    'category/([0-9]+)/priceup/page-([0-9]+)' => 'catalog/categorypriceup/$1/$2', //actionCategory in CatalogController
    'category/([0-9]+)/priceup' => 'catalog/categorypriceup/$1', //actionCategory in CatalogController

    'category/([0-9]+)/namedown/page-([0-9]+)' => 'catalog/categorynamedown/$1/$2', //actionCategory in CatalogController
    'category/([0-9]+)/namedown' => 'catalog/categorynamedown/$1', //actionCategory in CatalogController

    'category/([0-9]+)/nameup/page-([0-9]+)' => 'catalog/categorynameup/$1/$2', //actionCategory in CatalogController
    'category/([0-9]+)/nameup' => 'catalog/categorynameup/$1', //actionCategory in CatalogController


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
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    // Управление категориями:
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    // Управление заказами:
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    // Админпанель:
    'admin' => 'admin/index',
    // О магазине
    'contacts' => 'site/contact',
    'about' => 'site/about',
    'shares' => 'site/shares',
    'delivery' => 'site/delivery',
    // Главная страница
    'page-([0-9]+)' => 'site/index/$1', //actionNew in SiteController
    '' => 'site/index', //actionIndex in SiteController


);