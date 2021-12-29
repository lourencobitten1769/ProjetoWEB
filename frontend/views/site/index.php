<?php

/* @var $this yii\web\View */

$this->title = 'Homepage';

?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="site-index">

    <div class="body-content">

        <input type="checkbox" id="check">
        <label for="check">
            <img src="images/menu.png" id="btn">
            <img src="images/close.png" id="close">
        </label>
        <div class="sidebar">
            <header>Categorias</header>
            <ul>
                <?php
                foreach ($categories as $category){
                    ?>
                    <li><a href="#"><?php echo $category->category?></a> </li>
                <?php
                }
                ?>



            </ul>
        </div>

        <div>
            <input type="text" placeholder="Procurar..." style="margin-left: 90%;border-radius: 40px">
        </div>
        <br>
        <div class="row d-flex equal" >
        <?php
        foreach ($products as $product){?>
                <div class="col-lg-3">
                    <div class="card" style="width: 200px;">
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
