<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProvidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
\backend\assets\AppAsset::register($this);

?>
<div class="providers-index">

    <?php Pjax::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <h4 class="title pull-left">Providers List</h4>
                                <a href="?r=provider%2Fcreate" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Create Provider</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Provider ID</th>
                                <th>Provider Name</th>
                                <th>Provider NIF</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="5"><input type="text" class="form-control" placeholder="Search Providers"></td>
                            </tr>
                            <?php
                            foreach ($providers as $provider){?>
                                <tr>
                                    <td><?php echo $provider->providers_id?></td>
                                    <td><?php echo $provider->provider_name?></td>
                                    <td><?php echo $provider->nif?></td>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="?r=provider%2Fview&category_id=<?php echo $provider->providers_id?>" class="btn btn-success"><i class="fa fa-search"></i></a></li>
                                            <li><a href="?r=provider%2Fupdate&category_id=<?php echo $provider->providers_id?>" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="?r=provider%2Fdelete&category_id=<?php echo $provider->providers_id?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></li>
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
                            <div class="col-sm-6 col-xs-6">Showing <b><?php echo $number_providers?></b> out of <b><?php echo $number_providers?></b> entries</div>
                            <div class="col-sm-6 col-xs-6">
                                <ul class="pagination hidden-xs pull-right">
                                    <li><a href="#">«</a></li>

                                    <?php
                                    $number_pages=ceil($number_providers/5);

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

    <?php Pjax::end(); ?>

</div>
