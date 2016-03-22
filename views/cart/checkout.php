<?php include ROOT . '/views/layouts/header.php'; ?>

    <div id="content">





    <div class="row">

    <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <h2 class="title text-center">Корзина</h2>
                    </br>


                    <?php if ($result): ?>
                        <p><center>Заказ оформлен! Наш менеджер Вам перезвонит.</center></p>
                    <?php else: ?>

                    <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, $</p><br/>

                    <?php if (!$result): ?>


                                <?php if (isset($errors) && is_array($errors)): ?>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li> - <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>


                                <div class="login-form">
                                    <br/>
                                    <form action="#" method="post">
                                        <p>Ваше имя</p>
                                        <input type="text" name="userName" placeholder="Имя" value="<?php echo $userName; ?>"/>
                                        <p>Номер телефона</p>
                                        <input type="text" name="userPhone" placeholder="Телефон" value="<?php echo $userPhone; ?>"/>
                                        <p>Комментарий к заказу</p>
                                        <input type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/>
                                        <br/>
                                        <br/>
                                        <input type="submit" name="submit" class="btn btn-default" value="Оформить" />
                                    </form>
                                </div>

                                <br/>
                                <br/>


                        <?php endif; ?>

                    <?php endif; ?>
</div> </div>


    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>