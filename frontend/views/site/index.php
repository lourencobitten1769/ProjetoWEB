<?php

/* @var $this yii\web\View */

$this->title = 'Homepage';

?>
<div class="site-index">

    <div class="body-content">
        <div>
            <input type="text" placeholder="Procurar..." style="margin-left: 90%;border-radius: 40px">
        </div>
        <br>
            <div class="row d-flex equal">
        <?php
        foreach ($products as $product){?>
                <div class="col-lg-3">
                    <div class="card" style="width: 200px">
                        <div class="imgBx">
                            <img src="images/<?php echo $product->image?>" style="width: 200px;height: 170px">
                        </div>
                        <div class="contentBx">
                            <h3><?php echo $product->product_name?></h3>
                            <h2 class="price"><?php echo $product->price?>€</h2>
                            <a href="?r=product%2Fdetail&id=<?php echo $product->product_id?>" class="buy">Comprar</a>
                        </div>
                    </div>
                </div>
        <?php
        }
        ?>
    </div>
</div>
