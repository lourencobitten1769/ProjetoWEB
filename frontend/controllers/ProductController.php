<?php

namespace frontend\controllers;

use app\models\Products;

class ProductController extends \yii\web\Controller
{
    public function actionDetail($id)
    {
        $product=\common\models\Products::findOne($id);
        return $this->render('detail',['product'=>$product]);
    }

}
