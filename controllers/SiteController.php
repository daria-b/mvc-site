<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class SiteController
{
    public function actionIndex($page = 1)
    {
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getNewProducts(6, $page);
        $total = Product::getNewTotalProducts();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/site/index.php');
        return true;
    }


    public function actionContact()
    {
        $categories = Category::getCategoriesList();

        $userEmail = '';
        $userText = '';
        $result = false;

        if (isset($_POST['submit'])){

            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            if (!User::checkEmail($userEmail)){
                $errors[] = 'Неправильный Email';
            }

            if ($errors == false){
                $adminEmail = 'darja-b@ukr.net';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        require_once(ROOT . '/views/site/contact.php');

        return true;
    }

    public function actionAbout()
    {
        $categories = Category::getCategoriesList();

        require_once(ROOT . '/views/site/about.php');
        return true;
    }


    public function actionDelivery()
    {
        $categories = Category::getCategoriesList();

        require_once(ROOT . '/views/site/delivery.php');
        return true;
    }


    public function actionSearch(){

        $categories = Category::getCategoriesList();

        if (!empty($_GET['query'])) {

            $x = $_GET['query'];
            $search_result = array();
            $search_result = Product::searchProduct($x);
        }

        require_once(ROOT . '/views/site/search.php');
        return true;
    }


    public function actionMessage($page = 1){

        $categories = Category::getCategoriesList();

        $comments = Comment::getMessages($page);

        $total = Comment::getAllTotalMessages();
        $pagination = new Pagination($total, $page, User::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/site/message.php');
        return true;
    }

}