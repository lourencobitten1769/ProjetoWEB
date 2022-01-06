<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
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
                                <h4 class="title pull-left">Lista de Categorias</h4>
                                <a href="?r=category%2Fcreate" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Criar Categoria</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID da Categoria</th>
                                <th>Nome da Categoria</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $number_pages=ceil($number_categories/5);

                            foreach ($categories->getModels() as $category){?>
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
                            <div class="col-sm-6 col-xs-6" >
                                <ul class="pagination hidden-xs pull-right" style="justify-content: center; margin-left: 100%">
                                    <?php
                                    $number_pages=ceil($number_categories/5);

                                    for($pag=1;$pag<=$number_pages;$pag++)
                                    {
                                    ?>
                                        <li><a href="?r=category%2Findex&page=<?php echo $pag?>"><?php echo $pag?></a></li>
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
