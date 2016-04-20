<?php include ROOT . '/views/layouts/header.php'; ?>

<div id="content">

    <h3 class="shares-title">Оставьте свой отзыв о магазине</h3>
        <br>
        <br>

    <form action="/components/Message.php" method="post" name="form">

        <div class="post">

            Ваше имя:<br>
            <input name="author" type="text" id="author" class="post-form">
        </p>
        <p>
            Ваш отзыв:<br>
            <textarea name="message" rows="5" cols="50" id="message" class="post-form"></textarea>
        </p>
        </div>

        <input name="js" type="hidden" value="no" id="js">
        <p>
            <input name="button" type="submit" value="Отправить" id="send" class="to-post"> <span id="resp"></span>
        </p>
    </form>

    <div id="commentBlock">
        <?php
        foreach($comments as $comment)
        {
            echo "<div class='comment'><strong class='comment-title'>".$comment['author']." </strong>"."<div class='comment-left'><strong class='comment-title'>".$comment['date']."</strong></div><br>"."<br>".$comment['message']."</div>";

        }
        ?>
    </div>

    <div id="navigation">
        <?php echo $pagination->get();?>
    </div>

</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>