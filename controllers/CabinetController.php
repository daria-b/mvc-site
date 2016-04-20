<?php

class CabinetController
{
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();

        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }


    public function actionEdit()
    {
        $categories = Category::getCategoriesList();

        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];
        $address = $user['address'];
        $phone = $user['phone'];

        $result = false;

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            $errors = false;

            if (!User::checkName($name)){
                $errors[] = 'Имя не должно быть короче 2-х символов';

            }

            if (!User::checkPassword($password)){
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (!User::checkPhone($phone)){
                $errors[] = 'Номер телефона должен состоять из 11 цифр';

            }

            if (!User::checkAddress($address)){
                $errors[] = 'Адрес не должен быть короче 4-х символов';

            }

            if ($errors == false){
                $result = User::edit($userId, $name, $password, $address, $phone);
            }

        }

        require_once(ROOT . '/views/cabinet/edit.php');

        return true;
    }

}