<?php include ROOT . '/views/layouts/header.php'; ?>

        <div id="content">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if ($result): ?>
                        <h3><center>Данные отредактированы!</center></h3>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="signup-form">
                            <h2><center>Редактирование данных</center></h2>
                            <form action="#" method="post">
                                <p>Изменить имя</p>
                                <input type="text" name="name" required placeholder="Имя" value="<?php echo $name; ?>"/>

                                <p>Изменить пароль</p>
                                <input type="password" name="password" required placeholder="Пароль" value="<?php echo $password; ?>"/>

                                <p>Изменить адрес доставки</p>
                                <input type="text" name="address" placeholder="Адрес" value="<?php echo $address; ?>"/>

                                <p>Изменить номер телефона</p>
                                <input type="text" name="phone" placeholder="Телефон" value="<?php echo $phone; ?>"/>

                                <br/>
                                <input type="submit" name="submit" class="btn btn-default" value="Сохранить" />
                            </form>
                        </div>

                    <?php endif; ?>
                    <br/>
                    <br/>

                </div>
            </div>
        </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>