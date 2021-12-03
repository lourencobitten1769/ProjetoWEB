<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
\backend\assets\AppAsset::register($this);
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <h4 class="title pull-left">Users List</h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Morada</th>
                                <th>NIF</th>
                                <th>Pontos</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="5"><input type="text" class="form-control" placeholder="Search Products"></td>
                            </tr>
                            <?php
                            foreach ($users as $user){?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $user->username?></td>
                                    <td><?php echo $user->email?></td>
                                    <td><?php echo $user->morada?></td>
                                    <td><?php echo $user->nif?></td>
                                    <td><?php echo $user->pontos?></td>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="?r=user%2Fview&user_id=<?php echo $user->id?>" class="btn btn-success"><i class="fa fa-search"></i></a></li>
                                            <li><a href="?r=user%2Fupdate&user_id=<?php echo $user->id?>" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="?r=user%2Fdelete&user_id=<?php echo $user->id?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>

    <?php Pjax::end(); ?>

</div>
