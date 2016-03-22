<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class SiteController
{
    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Список последних товаров
        $latestProducts = Product::getLatestProducts();

        //Список товаров для слайдера
        $sliderProducts = Product::getRecommendedProducts();

        // Подключаем вид
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

            //Валидация полей
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

    public function actionShares()
    {
        $categories = Category::getCategoriesList();

        require_once(ROOT . '/views/site/shares.php');
        return true;
    }
}