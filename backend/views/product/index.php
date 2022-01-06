<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
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
                            <h4 class="title pull-left">Lista de Produtos</h4>
                            <a href="?r=product%2Fcreate" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Adicionar Produto</a>
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
                            <?php
                            foreach ($products->getModels() as $product){?>
                            <tr>
                                <td>
                                    <div class="user_icon">
                                        <img src="http://localhost/projetoweb/frontend/web/images/<?php echo $product->image?>" alt="">
                                    </div>
                                </td>
                                <td><?php echo $product->product_name?></td>
                                <td><?php echo substr($product->description,0, 50)?></td>
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
                        <div class="col-sm-6 col-xs-6">
                            <ul class="pagination hidden-xs pull-right"  style="justify-content: center; margin-left: 100%">
                                <?php
                                $number_pages=ceil($number_products/5);

                                for($pag=1;$pag<=$number_pages;$pag++)
                                {
                                    ?>
                                    <li><a href="?r=product%2Findex&page=<?php echo $pag?>"><?php echo $pag?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php Pjax::end(); ?>

</div>
