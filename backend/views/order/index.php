<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
\backend\assets\AppAsset::register($this);

?>
<head>
    <?= Html::csrfMetaTags() ?>
</head>
<div class="orders-index">


    <?php Pjax::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <h4 class="title pull-left">Restock</h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Nome Produto</th>
                                <th>Descrição</th>
                                <th>Quantidade</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($products as $product){

                                if($product->stock==0)
                                { ?>
                                    <tr>
                                        <td>
                                            <div class="user_icon">
                                                <img src="http://localhost/projetoweb/frontend/web/images/<?php echo $product->image?>" alt="">
                                            </div>
                                        </td>
                                        <td><?php echo $product->product_name?></td>
                                        <td><?php echo substr($product->description,0, 50)?></td>
                                        <td><?php echo $product->stock?></td>
                                        <td>
                                            <form method="post" action="<?php echo \yii\helpers\Url::to(['/order/update', 'product_id'=>$product->product_id,])?>">
                                                <input type="number" name="quantity">
                                                <input type="submit" name="submit" value="Restock">
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php Pjax::end(); ?>

</div>
