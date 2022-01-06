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

                <div class="col-md-8">
                    <div class="product-title"><?php echo $product->product_name ?></div>
                    <div class="product-desc"><?php echo $product->description ?></div>
                    <hr>
                    <div class="product-price"><?php echo $product->price?>€</div>

                    <?php
                    $stock=$product->stock;

                    if($stock==0)
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

                        <?php
                        if($stock==0)
                        {?>
                            <a href="<?php echo \yii\helpers\Url::to(['/cart/add', 'id'=>$product->product_id])?>"><button type="button" class="btn btn-success btn-add-to-cart" disabled>
                        Adicionar ao Carrinho
                        </button></a>
                        <?php
                        }
                        else{
                            if(!Yii::$app->user->isGuest){?>


                                <form method="post" action="<?php echo \yii\helpers\Url::to(['/cart/add', 'id'=>$product->product_id,])?>">

                                    <label for="quantity">Quantidade</label>
                                      <input type="number" min="0" max="<?php echo $product->stock?>" name="quantity" id="quantity">
                                <input type="submit" class="btn btn-success btn-add-to-cart" name="btnAddCart" value="Adicionar ao carrinho">
                                </form>
                        <?php
                                 }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
         <div class="container">
                <h5 class="text-center font-weight-bold">Produtos Relacionados</h5>
                <div class="row d-flex equal">
                    <?php
                    foreach($related_products as $related_product)
                    {
                        if($related_product['product_id']!=$product['product_id'])
                        {
                        ?>
                     <div class="col-lg-3">
                         <div class="card" style="width: 150px;height: 280px">
                             <div class="imgBx">
                                 <img src="images/<?php echo $related_product['image']?>" style="width: 100px">
                             </div>
                             <div class="contentBx">
                                 <h4><?php echo $related_product['product_name']?></h4>
                                 <h4 class="price"><?php echo $related_product['price']?>€</h4>
                                 <a style="width: 140px;height: 40px;font-size: 15px" href="?r=product%2Fdetail&id=<?php echo $related_product['product_id']?>" class="buy">Comprar</a>
                             </div>
                         </div>
                     </div>

                    <?php
                        }
                    }
                    ?>
            </div>