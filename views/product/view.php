<?php include ROOT.'/views/layouts/header.php'; ?>

<div id="content">

    <div class="product-view">

        <center><h2><?php echo $product['name']; ?></h2></center>

        <div class="fornew">
            <p class="fig"><img src="<?php echo Product::getImage($product['id']); ?>" alt="" /></p>
            <?php if ($product['is_new']): ?>
                <img src="/template/images/home/new.png" class="new" alt="" />
            <?php endif; ?>
        </div>

        <br/>
        <br/>

        <span>
            <center><span class="price">Цена: <?php echo $product['price']; ?> грн</span></center>
            <br/>
            <!--<label>Количество:</label>
            <span class="for-center">
            <input type="text" value="3" />-->
        </span>
        <br/>

        <a href="#dialog" name="modal" data-id="<?php echo $product['id']; ?>"
           class="to-cart">В корзину</a>
        <div id="dialog" class="window">
            <a href="#"class="close"/>X</a>
            <p class="mod-win">Товар добавлен в корзину!</p>
        </div>
        <div id="mask"></div>

        <br/>

        <p><b>Код товара: </b> <?php echo $product['code']; ?></p>
        <p><b>Наличие: </b> <?php if ($product['availability'] == 1) {echo "Есть на складе";} else echo "Нет на складе"; ?></p>
        <p><b>Производитель: </b><?php echo $product['brand']; ?></p>
        <p><b>Описание товара: </b><?php echo $product['description']; ?></p>

    </div>

</div>


<?php include ROOT.'/views/layouts/footer.php'; ?>