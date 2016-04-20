<?php

$db = mysql_connect("db2.ho.ua","technoshop","GazTkqdN6v");
mysql_select_db("technoshop",$db);
mysql_query("SET NAMES utf8");

if(empty($_POST['js'])){
    if($_POST['message'] != '' && $_POST['author'] != ''){
        if ((strlen($_POST['message']) > 300) || (strlen($_POST['author']) > 30)) {
            echo 3;
        } else {

        $author = $_POST['author'];
        $author = addslashes($author);
        $author = htmlspecialchars($author);
        $author = stripslashes($author);
        $author = mysql_real_escape_string($author);

        $message = $_POST['message'];
        $message = addslashes($message);
        $message = htmlspecialchars($message);
        $message = stripslashes($message);
        $message = mysql_real_escape_string($message);

        $date = $_POST['date'];
        $date = addslashes($date);
        $date = htmlspecialchars($date);
        $date = stripslashes($date);
        $date = mysql_real_escape_string($date);

        $result = mysql_query("INSERT INTO messages (author, message, date) VALUES ('$author', '$message', '$date')");
        if($result == true){
            echo 0; //Ваше сообшение успешно отправлено
        }else{
            echo 1;  //Сообщение не отправлено. Ошибка базы данных
        }
    }}else{
        echo 2;  //Нельзя отправлять пустые сообщения
    }
}