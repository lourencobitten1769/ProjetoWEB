<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Homepage';
\backend\assets\AppAsset::register($this);
?>


<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="user-profile">

    <div class="body-content">
            <div class="profile">
                <div class="col-sm-4">
                    <form action="?r=user%2Fupdate&id=<?php echo Yii::$app->user->identity->id?>" method="post">
                        <h1>Informações do Perfil</h1>
                        <hr>
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" value="<?php echo Yii::$app->user->identity->username?>">
                        <br>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="<?php echo Yii::$app->user->identity->email?>">
                        <br>
                        <label for="morada">Morada:</label>
                        <input type="text" name="morada" id="morada" value="<?php echo Yii::$app->user->identity->morada?>">
                        <br>
                        <label for="nif">NIF:</label>
                        <input type="text" name="nif" id="nif" value="<?php echo Yii::$app->user->identity->nif?>">
                        <br>
                        <input type="submit" value="Alterar Informações" id="btnAlterar" name="btnAlterar">
                    </form>
                </div>

                <div class="col-sm-8">
                    <h1>Histórico de Compras</h1>
                    <table class="col-xs-7 table-bordered table-striped table-condensed table-fixed">
                        <thead>
                        <tr>
                            <th class="col">Data de Compra</th>
                            <th class="col">Preço Total</th>
                            <th class="col">Consultar Compra</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($purchases as $purchase):?>
                            <tr>
                                <td class="col"><?php echo $purchase['date']?></td>
                                <td class="col"><?php echo $purchase['total_price']?></td>
                                <td class="col"><a href="?r=purchase%2Fpdf&purchase_id=<?php echo $purchase['purchase_id']?>">Consultar</a> </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>

                </div>
            </div>
    </div>

</div>