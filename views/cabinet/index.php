<?php include ROOT . '/views/layouts/header.php';?>

<div id="content">

    <div id="cabinet">

            <br/>
            <h3><center>Кабинет пользователя</center></h3>
            <br/>
            <h4 class="user-name"><center>Добро пожаловать, <?php echo $user['name'];?>!</center></h4>
            <br/>

            <ul class="user-link">
                <li><a href="/cabinet/edit" class="text-cabinet">Редактировать личные данные</a></li>
                <li><a href="/cart" class="text-cabinet">Корзина покупок</a></li
            </ul>

    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br>

</div>

<?php include ROOT . '/views/layouts/footer.php';?>
