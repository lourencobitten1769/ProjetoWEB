<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>
<div class="site-index">

    <div class="body-content">
        <div>
            <input type="text" placeholder="Search.." style="margin-left: 90%;border-radius: 40px">
        </div>
        <br>
        <div>
            <div class="row">
                <div class="col-lg-3">
                   <img src="images/logo.jfif" style="height: 200px;width: 200px">
                </div>
                <div class="col-lg-6">
                    <h1><?php echo $product->product_name?></h1>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>

