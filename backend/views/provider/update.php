<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Providers */

$this->title = 'Update Providers: ' . $model->providers_id;
$this->params['breadcrumbs'][] = ['label' => 'Providers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->providers_id, 'url' => ['view', 'providers_id' => $model->providers_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="providers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
