<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $userType= \app\models\AuthItem::findBySql('SELECT * FROM auth_item WHERE type=1')->all();

    $listData=\yii\helpers\ArrayHelper::map($userType,'name','name');
    ?>

    <?= $form->field($model, 'item_name')->dropDownList($listData)->label('Role') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
