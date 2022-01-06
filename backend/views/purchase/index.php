<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
\backend\assets\AppAsset::register($this);




?>
<div class="purchases-index">

    <?php Pjax::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <h4 class="title pull-left">Lista de Compras</h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID da Compra</th>
                                <th>Preço Total</th>
                                <th>Data</th>
                                <th>Utilizador</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($purchases->getModels() as $purchase){?>
                                <tr>
                                    <td><?php echo $purchase->purchase_id?></td>
                                    <td><?php echo $purchase->total_price?></td>
                                    <td><?php echo $purchase->date?></td>
                                    <td><?php echo $purchase->user_id?></td>

                                    <td>
                                        <ul class="action-list">
                                            <li><a href="?r=purchase%2Fview&purchase_id=<?php echo $purchase->purchase_id?>" class="btn btn-success"><i class="fa fa-search"></i></a></li>
                                            <li><a href="?r=purchase%2Fdelete&purchase_id=<?php echo $purchase->purchase_id?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></li>
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
                                    $number_pages=ceil($number_purchases/5);

                                    for($pag=1;$pag<=$number_pages;$pag++)
                                    {
                                        ?>
                                        <li><a href="?r=purchase%2Findex&page=<?php echo $pag?>"><?php echo $pag?></a></li>
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
