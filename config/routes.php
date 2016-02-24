<?php

return array(
    'product/([0-9]+)' => 'product/view/$1', //actionView in ProductController

    'catalog' => 'catalog/index', //actionIndex in CatalogController

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //actionCategory in CatalogController
    'category/([0-9]+)' => 'catalog/category/$1', //actionCategory in CatalogController

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'index' => 'site/index', //actionIndex in SiteController

);