<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <div id="content">
        <div class="content-admin">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin" class="text-cabinet">Админпанель</a></li>
                    <li><a href="/admin/category" class="text-cabinet">Управление категориями</a></li>
                    <li class="active">Редактировать категорию</li>
                </ol>
            </div>

            <center><h4>Редактировать категорию "<?php echo $category['name']; ?>"</h4></center>

            <br/>

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $category['name']; ?>">

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="<?php echo $category['sort_order']; ?>">
                        
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
                        </select>

                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

