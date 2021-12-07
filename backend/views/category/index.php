<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
\backend\assets\AppAsset::register($this);

?>
<div class="categories-index">


    <?php Pjax::begin(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <h4 class="title pull-left">Categories List</h4>
                                <a href="?r=category%2Fcreate" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Create Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="5"><input type="text" class="form-control" placeholder="Search Categories"></td>
                            </tr>
                            <?php
                            foreach ($categories as $category){?>
                                <tr>
                                    <td><?php echo $category->category_id?></td>
                                    <td><?php echo $category->category?></td>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="?r=category%2Fview&category_id=<?php echo $category->category_id?>" class="btn btn-success"><i class="fa fa-search"></i></a></li>
                                            <li><a href="?r=category%2Fupdate&category_id=<?php echo $category->category_id?>" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="?r=category%2Fdelete&category_id=<?php echo $category->category_id?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></li>
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
                            <div class="col-sm-6 col-xs-6">Showing <b><?php echo $number_categories?></b> out of <b><?php echo $number_categories?></b> entries</div>
                            <div class="col-sm-6 col-xs-6">
                                <ul class="pagination hidden-xs pull-right">
                                    <li><a href="#">«</a></li>
                                    <?php
                                    $number_pages=ceil($number_categories/5);

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
