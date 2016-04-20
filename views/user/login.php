<?php include ROOT . '/views/layouts/header.php'; ?>

<div id="content">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="signup-form">
                    <h2><center>Вход на сайт</center></h2>
                    <br/>
                    <form action="#" method="post">
                        <p>Ваш E-mail</p>
                        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                        <p>Ваш пароль</p>
                        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                        <br/>
                        <input type="submit" name="submit" class="btn btn-default" value="Вход" />
                    </form>
                </div>

                <br/>
                <br/>
            </div>
        </div>

    <br><br><br><br>

</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>