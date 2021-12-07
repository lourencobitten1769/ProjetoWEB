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


    <?php Pjax::begin(); ?>

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
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">Showing <b><?php echo $number_users?></b> out of <b><?php echo $number_users?></b> entries</div>
                            <div class="col-sm-6 col-xs-6">
                                <ul class="pagination hidden-xs pull-right">
                                    <li><a href="#">«</a></li>
                                    <?php
                                    $number_pages=ceil($number_users/5);

                                    for($pag=1;$pag<=$number_pages;$pag++)
                                    {
                                        ?>
                                    <li><a href="#"><?php echo $pag?></a></li><?php
                                    }

                                    ?>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

    <?php Pjax::end(); ?>

</div>
