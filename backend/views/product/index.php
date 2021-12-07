<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
\backend\assets\AppAsset::register($this);


?>

<style>


</style>
<div class="products-index">

    <?php Pjax::begin(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h4 class="title pull-left">Users List</h4>
                            <a href="?r=product%2Fcreate" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Create Product</a>
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
                                <th>Preço</th>
                                <th>Tamanho</th>
                                <th>Stock</th>
                                <th>Categoria</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5"><input type="text" class="form-control" placeholder="Search Products"></td>
                            </tr>
                            <?php
                            foreach ($products as $product){?>
                            <tr>
                                <td>
                                    <div class="user_icon">
                                        <img src="http://localhost/projetoweb/frontend/web/images/<?php echo $product->image?>" alt="">
                                    </div>
                                </td>
                                <td><?php echo $product->product_name?></td>
                                <td><?php echo $product->description?></td>
                                <td><?php echo $product->price?></td>
                                <td><?php echo $product->size?></td>
                                <td><?php echo $product->stock?></td>
                                <td><?php echo $product->category->category?></td>
                                <td>
                                    <ul class="action-list">
                                        <li><a href="?r=product%2Fview&product_id=<?php echo $product->product_id?>" class="btn btn-success"><i class="fa fa-search"></i></a></li>
                                        <li><a href="?r=product%2Fupdate&product_id=<?php echo $product->product_id?>" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                        <li><a href="?r=product%2Fdelete&product_id=<?php echo $product->product_id?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">Showing <b><?php echo $number_products?></b> out of <b><?php echo $number_products?></b> entries</div>
                        <div class="col-sm-6 col-xs-6">
                            <ul class="pagination hidden-xs pull-right">
                                <li><a href="#">«</a></li>
                                <?php
                                $number_pages=ceil($number_products/5);

                                for($pag=1;$pag<=$number_pages;$pag++)
                                {
                                    ?>
                                    <li><a href="#"><?php echo $pag?></a></li>
                                <?php } ?>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php /*GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'product_name',
            'description:ntext',
            'price',
            'size',
            //'stock',
            //'image',
            //'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>

    <?php Pjax::end(); ?>

</div>
