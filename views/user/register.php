<?php include ROOT . '/views/layouts/header.php'; ?>

<div id="content">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if ($result): ?>
                    <p>Вы зарегистрированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                <?php endif; ?>

                <div class="signup-form">
                    <h2><center>Регистрация на сайте</center></h2>
                    <br/>
                    <form action="#" method="post">
                        <p>Имя</p>
                        <input type="text" name="name" required placeholder="Имя" value="<?php echo $name; ?>"/>
                        <p>E-mail</p>
                        <input type="email" name="email" required placeholder="E-mail" value="<?php echo $email; ?>"/>
                        <p>Пароль</p>
                        <input type="password" name="password" required placeholder="Пароль" value="<?php echo $password; ?>"/>
                        <p>Адрес</p>
                        <input type="text" name="address" placeholder="Адрес" value="<?php echo $address; ?>"/>
                        <p>Телефон</p>
                        <input type="text" name="phone" placeholder="Телефон" value="<?php echo $phone; ?>"/>
                        <br/>
                        <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
                    </form>
                </div>

                <?php endif; ?>

                <br/>
                <br/>
            </div>
        </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>