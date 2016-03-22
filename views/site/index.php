<?php include ROOT.'/views/layouts/header.php'; ?>

<div id="forslides">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="/php/site/template/images/i/11.jpg" alt="New York" width="940" height="700">
                <!--<div class="carousel-caption">
                    <h3>New York</h3>
                    <p>The atmosphere in New York is lorem ipsum.</p>
                </div>-->
            </div>

            <div class="item">
                <img src="/php/site/template/images/i/12.jpg" alt="Chicago" width="940" height="700">
                <!--<div class="carousel-caption">
                    <h3>Chicago</h3>
                    <p>Thank you, Chicago - A night we won't forget.</p>
                </div>-->
            </div>

            <div class="item">
                <img src="/php/site/template/images/i/13.jpg" alt="Los Angeles" width="940" height="700">
                <!--<div class="carousel-caption">
                    <h3>LA</h3>
                    <p>Even though the traffic was a mess, we had the best time playing at Venice Beach!</p>
                </div>-->
            </div>

            <div class="item">
                <img src="/php/site/template/images/i/14.jpg" alt="Chicago" width="940" height="700">
                <!--<div class="carousel-caption">
                    <h3>Chicago</h3>
                    <p>Thank you, Chicago - A night we won't forget.</p>
                </div>-->
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

        <a href="/php/site/product/<?php echo $product['id']; ?>" class="product-title">
            <?php echo $product['name']; ?>
        </a>

        <div class="fornew">
        <a href="/php/site/product/<?php echo $product['id']; ?>"><img src="<?php echo Product::getImage($product['id']); ?>" alt=""></a>
            <?php if ($product['is_new']): ?>
                <img src="/php/site/template/images/home/new.png" class="new" alt="" />
            <?php endif; ?>
        </div>

        <div class="price">Цена: <?php echo $product['price']; ?>$</div>
        <a href="#" data-id="<?php echo $product['id']; ?>"
           class="to-cart">В корзину</a>


    </div>

    <?php endforeach; ?>

    </div>

    <div id="navigation">
        <a href="#"><span>1</span></a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">&raquo;</a>
    </div>

</div>

<?php include ROOT.'/views/layouts/footer.php'; ?>