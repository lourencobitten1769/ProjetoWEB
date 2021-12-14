<?php

/* @var $this yii\web\View */

$this->title = $product->product_name;

?>
<div class="container-fluid">
    <div class="content-wrapper">
        <div class="item-container">
            <div class="container">
                <div class="col-md-12">
                    <div class="product col-md-3 service-image-left">

                        <center>
                            <img id="item-display" src="images/<?php echo $product->image?>">
                        </center>

                    </div>
                </div>

                <div class="col-md-7">
                    <div class="product-title"><?php echo $product->product_name ?></div>
                    <div class="product-desc"><?php echo $product->description ?></div>
                    <hr>
                    <div class="product-price"><?php echo $product->price?>€</div>
                    <?php
                    $stock=$product->stock;

                    if($stock=0)
                    {
                        ?><div class="product-fora-stock">Fora de Stock</div><?php
                    }
                    else
                    {
                        ?><div class="product-stock">Em Stock</div><?php
                    }

                    ?>
                    <hr>
                    <div class="btn-group cart">
                        <button type="button" class="btn btn-success">
                            Adicionar ao Carrinho
                        </button>
                    </div>
                    <div class="btn-group wishlist">
                        <button type="button" class="btn btn-danger">
                            Comprar
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <section class="pt-5 pb-5">
            <div class="container">
                <h2 class="text-center font-weight-bold mb-5 mt-5">Produtos Relacionados</h2>
                <div class="row d-flex equal">
                        <div class="col-lg-3">
                            <div class="card" style="width: 200px">
                                <div class="imgBx">
                                    <img src="images/<?php echo $product->image?>" style="width: 200px">
                                </div>
                                <div class="contentBx">
                                    <h3><?php echo $product->product_name?></h3>
                                    <h2 class="price"><?php echo $product->price?>€</h2>
                                    <a href="?r=product%2Fdetail&id=<?php echo $product->product_id?>" class="buy">Comprar</a>
                                </div>
                            </div>
                    </div>
                        <div class="col-lg-3">
                            <div class="card" style="width: 200px">
                                <div class="imgBx">
                                    <img src="images/<?php echo $product->image?>" style="width: 200px">
                                </div>
                                <div class="contentBx">
                                    <h3><?php echo $product->product_name?></h3>
                                    <h2 class="price"><?php echo $product->price?>€</h2>
                                    <a href="?r=product%2Fdetail&id=<?php echo $product->product_id?>" class="buy">Comprar</a>
                                </div>
                            </div>
                    </div>
                        <div class="col-lg-3">
                            <div class="card" style="width: 200px">
                                <div class="imgBx">
                                    <img src="images/<?php echo $product->image?>" style="width: 200px">
                                </div>
                                <div class="contentBx">
                                    <h3><?php echo $product->product_name?></h3>
                                    <h2 class="price"><?php echo $product->price?>€</h2>
                                    <a href="?r=product%2Fdetail&id=<?php echo $product->product_id?>" class="buy">Comprar</a>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-3">
                        <div class="card" style="width: 200px">
                            <div class="imgBx">
                                <img src="images/<?php echo $product->image?>" style="width: 200px">
                            </div>
                            <div class="contentBx">
                                <h3><?php echo $product->product_name?></h3>
                                <h2 class="price"><?php echo $product->price?>€</h2>
                                <a href="?r=product%2Fdetail&id=<?php echo $product->product_id?>" class="buy">Comprar</a>
                            </div>
                        </div>
                </div>
            </div>
        </section>

