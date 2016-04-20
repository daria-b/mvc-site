<?php include ROOT.'/views/layouts/header.php'; ?>

<div id="content">

    <div id="leftblock">

        <?php foreach($categories as $categoryItem): ?>

        <a href="/category/<?php echo $categoryItem['id']; ?>" class="cat-title">
            <?php echo $categoryItem['name']; ?>
        </a>

        <div class="brands">
           <!-- <a href="#">&raquo;&raquo; Samsung</a>
            <a href="#">&raquo;&raquo; Lenovo</a>
            <a href="#">&raquo;&raquo; HP</a>
            <a href="#">&raquo;&raquo; Asus</a>
            <a href="#">&raquo;&raquo; Acer</a>-->
        </div>


        <?php endforeach; ?>


        <form action="http://www.technoshop.ho.ua/catalog/priceup/" method="post">
            <p><input class="sort" type="submit" name="submit" value="Цена по возрастанию"></p>
        </form>

        <form action="http://www.technoshop.ho.ua/catalog/pricedown/" method="post">
            <p><input class="sort" type="submit" name="submit" value="Цена по убыванию"></p>
        </form>

        <form action="http://www.technoshop.ho.ua/catalog/nameup/" method="post">
            <p><input class="sort" type="submit" name="submit" value="Бренд от A до Z"></p>
        </form>

        <form action="http://www.technoshop.ho.ua/catalog/namedown/" method="post">
            <p><input class="sort" type="submit" name="submit" value="Бренд от Z до A"></p>
        </form>

    </div>

    <div id="rightblock2">

        <?php foreach($latestProducts as $product): ?>

        <div class="product2">
            <a href="/product/<?php echo $product['id']; ?>" class="product-title">
                <?php echo $product['name']; ?>
            </a>

            <div class="fornew">
            <a href="/product/<?php echo $product['id']; ?>"><img src="<?php echo Product::getImage($product['id']); ?>" alt="" /></a>
                <?php if ($product['is_new']): ?>
                    <img src="/template/images/home/new.png" class="new" alt="" />
                <?php endif; ?>
            </div>

            <div class="price">Цена: <?php echo $product['price']; ?> грн</div>


            <a href="#dialog" name="modal" data-id="<?php echo $product['id']; ?>" class="to-cart">В корзину</a>
            <div id="dialog" class="window">
                <a href="#"class="close"/>X</a>
                <p class="mod-win">Товар добавлен в корзину!</p>
            </div>
            <div id="mask"></div>

        </div>


        <?php endforeach; ?>

    </div>

    <div id="navigation">
        <?php echo $pagination->get();?>
    </div>

</div>

<?php include ROOT.'/views/layouts/footer.php'; ?>
