<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <div id="content">
        <div class="content-admin">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin" class="text-cabinet">Админпанель</a></li>
                    <li><a href="/admin/category" class="text-cabinet">Управление категориями</a></li>
                    <li class="active">Удалить категорию</li>
                </ol>
            </div>

        <div id="cabinet">

            <h4>Удалить категорию #<?php echo $id; ?></h4>

            <p>Вы действительно хотите удалить эту категорию?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

