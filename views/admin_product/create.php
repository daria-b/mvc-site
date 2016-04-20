<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <div id="content">
        <div class="content-admin">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin" class="text-cabinet">Админпанель</a></li>
                    <li><a href="/admin/product" class="text-cabinet">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

            <center><h4>Добавить новый товар</h4></center>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>


                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название товара</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Код товара</p>
                        <input type="text" name="code" placeholder="" value="">

                        <p>Стоимость, грн</p>
                        <input type="text" name="price" placeholder="" value="">

                        <p>Категория</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Производитель</p>
                        <input type="text" name="brand" placeholder="" value="">

                        <p>Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="">

                        <p>Детальное описание</p>
                        <textarea name="description" rows="7" cols="32"></textarea>

                        <br/><br/>

                        <p>Наличие на складе</p>
                        <select name="availability">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>

                </div>
            </div>
        </div>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

