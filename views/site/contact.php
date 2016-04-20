<?php include ROOT . '/views/layouts/header.php'; ?>

<div id="content">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if ($result): ?>
                    <h3>Сообщение отправлено! Мы ответим Вам на указанный email.</h3>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                <?php endif; ?>

                <div class="signup-form">
                    <h2><center>Есть вопрос? Напишите нам</center></h2>
                    <br/>
                    <form action="#" method="post">
                        <p>Ваша почта</p>
                        <input type="email" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>"/>
                        <p>Ваше сообщение</p>
                        <input type="text" name="userText" placeholder="Сообщение" value="<?php echo $userText; ?>"/>
                        <br/>
                        <input type="submit" name="submit" class="btn btn-default" value="Отправить" />
                    </form>
                </div>

                <?php endif; ?>

                <br/>
                <br/>
            </div>
        </div>

    <br><br><br><br><br>

</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>