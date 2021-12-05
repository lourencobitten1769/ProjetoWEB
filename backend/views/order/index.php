<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
\backend\assets\AppAsset::register($this);

?>
<div class="orders-index">


    <?php Pjax::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <h4 class="title pull-left">Orders List</h4>
                                <a href="?r=provider%2Fcreate" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Create Order</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Quantidade</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="5"><input type="text" class="form-control" placeholder="Search Orders"></td>
                            </tr>
                            <?php
                            foreach ($orders as $order){?>
                                <tr>
                                    <td><?php echo $order->order_id?></td>
                                    <td><?php echo $order->quantidade?></td>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="?r=provider%2Fview&category_id=<?php echo $order->order_id?>" class="btn btn-success"><i class="fa fa-search"></i></a></li>
                                            <li><a href="?r=provider%2Fupdate&category_id=<?php echo $order->order_id?>" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="?r=provider%2Fdelete&category_id=<?php echo $order->order_id?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></li>
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
                            <div class="col-sm-6 col-xs-6">showing <b>5</b> out of <b>25</b> entries</div>
                            <div class="col-sm-6 col-xs-6">
                                <ul class="pagination hidden-xs pull-right">
                                    <li><a href="#">«</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#  ">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                                <ul class="pagination visible-xs pull-right">
                                    <li><a href="#">«</a></li>
                                    <li><a href="#">»</a></li>
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
