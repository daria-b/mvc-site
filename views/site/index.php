<?php include ROOT.'/views/layouts/header.php'; ?>

<div id="forslides">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="/template/images/i/new/14.jpg" alt="img1" width="940" height="700">
                <div class="carousel-caption green-title">
                    <h3>Широкий выбор техники!</h3>
                </div>
            </div>

            <div class="item">
                <img src="/template/images/i/new/11.jpg" alt="img2" width="940" height="700">
                <div class="carousel-caption green-title">
                    <h3>Доступные цены!</h3>
                </div>
            </div>

            <div class="item">
                <img src="/template/images/i/new/12.jpg" alt="img3" width="940" height="700">
                <div class="carousel-caption green-title">
                    <h3>Высокий уровень обслуживания!</h3>
                </div>
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>

<div id="content">

    <div id="title">
        <h2>НОВЫЕ ТОВАРЫ:</h2>
    </div>

    <div id="rightblock">

    <?php foreach($latestProducts as $product): ?>

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

        <div class="price">Цена: <?php echo $product['price']; ?> грн</div>

        <a href="#dialog" name="modal" data-id="<?php echo $product['id']; ?>"
           class="to-cart">В корзину</a>

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