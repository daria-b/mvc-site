<?php include ROOT . '/views/layouts/header.php';?>

<div id="content">

    <div id="cabinet">

            <br/>
            <h3>Кабинет пользователя</h3>
            <br/>
            <p>Привет, <?php echo $user['name'];?>!</p>
            <br/>

                <ul>

                <li><a href="/php/site/cabinet/edit" class="text-cabinet">Редактировать личные данные</a></li>
                <li><a href="/php/site/cart" class="text-cabinet">Корзина покупок</a></li>

                </ul>


    </div>

</div>

<?php include ROOT . '/views/layouts/footer.php';?>
