<?php

/*include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/components/Pagination.php';*/

class CatalogController
{
    public function actionIndex($page = 1)
    {
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6, $page);
        $total = Product::getAllTotalProducts();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }


    public function actionCategory($categoryId, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);
        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }

    public function actionPricedown($page = 1)
    {
        $categories = Category::getCategoriesList();

                $latestProducts = array();
                $latestProducts = Product::SortProductsPriceDown(6, $page);
                $total = Product::getAllTotalProducts();
                $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionPriceup($page = 1)
    {
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::SortProductsPriceUp(6, $page);
        $total = Product::getAllTotalProducts();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionNamedown($page = 1)
    {
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::SortProductsNameDown(6, $page);
        $total = Product::getAllTotalProducts();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionNameup($page = 1)
    {
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::SortProductsNameUp(6, $page);
        $total = Product::getAllTotalProducts();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }



    public function actionCategorypricedown($categoryId, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::PriceDownProductsListByCategory($categoryId, $page);
        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }

    public function actionCategorypriceup($categoryId, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::PriceUpProductsListByCategory($categoryId, $page);
        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }

    public function actionCategorynamedown($categoryId, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::NameDownProductsListByCategory($categoryId, $page);
        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }

    public function actionCategorynameup($categoryId, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::NameUpProductsListByCategory($categoryId, $page);
        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }

}
