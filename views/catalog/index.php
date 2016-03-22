<?php include ROOT.'/views/layouts/header.php'; ?>

<div id="content">

    <div id="leftblock">

        <?php foreach($categories as $categoryItem): ?>

        <a href="/php/site/category/<?php echo $categoryItem['id']; ?>" class="cat-title">
            <?php echo $categoryItem['name']; ?>
        </a>
        <div class="brands">
            <a href="#">&raquo;&raquo; Samsung</a>
            <a href="#">&raquo;&raquo; Lenovo</a>
            <a href="#">&raquo;&raquo; HP</a>
            <a href="#">&raquo;&raquo; Asus</a>
            <a href="#">&raquo;&raquo; Acer</a>
        </div>

        <?php endforeach; ?>

    </div>



    <div id="rightblock2">


        <?php foreach($latestProducts as $product): ?>

        <div class="product2">
            <a href="/php/site/product/<?php echo $product['id']; ?>" class="product-title">
                <?php echo $product['name']; ?>
            </a>

            <div class="fornew">
            <a href="/php/site/product/<?php echo $product['id']; ?>"><img src="<?php echo Product::getImage($product['id']); ?>" alt="" /></a>
                <?php if ($product['is_new']): ?>
                    <img src="/php/site/template/images/home/new.png" class="new" alt="" />
                <?php endif; ?>
            </div>

            <div class="price">ЦЕНА: <?php echo $product['price']; ?>$</div>
            <a href="#" data-id="<?php echo $product['id']; ?>" class="to-cart">В корзину</a>
        </div>
        <?php endforeach; ?>


        <!--<div class="clear"></div>-->

        <div id="navigation">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">&raquo;</a>
        </div>

    </div>

</div>

<?php include ROOT.'/views/layouts/footer.php'; ?>
