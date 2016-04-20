<?php include ROOT.'/views/layouts/header.php'; ?>

<div id="content">
    <div id="rightblock">
        <h3 class="text-header">Результаты запроса:</h3>

        <?php if (is_array($search_result)) : foreach($search_result as $product): ?>

            <div class="product">

                <a href="/product/<?php echo $product['id']; ?>" class="product-title">
                    <?php echo $product['name']; ?>
                </a>

                <div class="fornew">
                    <a href="/product/<?php echo $product['id']; ?>"><img src="<?php echo Product::getImage($product['id']); ?>" alt=""></a>
                    <?php if ($product['is_new']): ?>
                        <img src="/template/images/home/new.png" class="new" alt="" />
                    <?php endif; ?>
                </div>

                <div class="price">Цена: <?php echo $product['price']; ?>$</div>


                <a href="#dialog" name="modal" data-id="<?php echo $product['id']; ?>"
           class="to-cart">В корзину</a>
        <div id="dialog" class="window">
            <a href="#"class="close"/>X</a>
            <p class="mod-win">Товар добавлен в корзину!</p>
        </div>
        <div id="mask"></div>


            </div>

        <?php endforeach; ?>
        <?php else : echo $search_result; endif; ?>

    </div>
</div>

<?php include ROOT.'/views/layouts/footer.php'; ?>
