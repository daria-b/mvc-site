<?php include ROOT . '/views/layouts/header.php'; ?>


        <div id="content">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if ($result): ?>
                        <p>Данные отредактированы!</p>
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
                                <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>

                                <p>Изменить пароль</p>
                                <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
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