<?php include ROOT.'/views/layouts/header.php'; ?>

<div id="content">


    <div class="product-view">


                                    <center><h2><?php echo $product['name']; ?></h2></center>

                                    <p class="fig"><img src="<?php echo Product::getImage($product['id']); ?>" alt="" /></p>
                                    <br/>
                                    <br/>



                                    <label>Код товара:</label> <?php echo $product['code']; ?>
                                        <span>
                                            <center><span class="price">US $<?php echo $product['price']; ?></span></center>
                                            <br/>


                                            <label>Количество:</label>
                                            <span class="for-center">
                                            <input type="text" value="3" />

                                            </span>
                                            <br/>
                                            <br/>
                                            <a href="#" data-id="<?php echo $product['id']; ?>"
                                               class="to-cart">В корзину</a>
                                        </span>
                                    <p><b>Наличие:</b> На складе</p>
                                    <p><b>Состояние:</b> Новое</p>
                                    <p><b>Производитель:</b> D&amp;G</p>





                                <label>Описание товара:</label>
                                <?php echo $product['description']; ?>



    </div>

</div>


<?php include ROOT.'/views/layouts/footer.php'; ?>