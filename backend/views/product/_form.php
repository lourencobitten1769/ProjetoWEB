<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'size')->textInput(['class'=>'size form-control']) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?php
    $categories= \app\models\Categories::find()->all();

    $listData=\yii\helpers\ArrayHelper::map($categories,'category_id','category');

    ?>

    <?= $form->field($model, 'category_id')->dropDownList($listData,['class'=>'category form-control','prompt'=>'Select...','onchange'=>'callAFunction()']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function callAFunction(){
        if($('.category').val()!=1){
            $('.size').prop('disabled',true);
        }
        else {
            $('.size').prop('disabled',false);
        }
    }
</script>

