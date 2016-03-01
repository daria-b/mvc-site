<?php

class AdminController extends AdminBase
{
    // Action для стартовой страницы "Панель администратора"
    public function actionIndex()
    {
        // Права доступа
        self::checkAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }
}