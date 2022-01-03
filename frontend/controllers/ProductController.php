<?php

namespace frontend\controllers;

use app\models\Products;
use common\models\Categories;

class ProductController extends \yii\web\Controller
{
    public function actionDetail($id)
    {
        $product=\common\models\Products::findOne($id);
        return $this->render('detail',['product'=>$product]);
    }

    public function actionCategory($category_id){
        $products= \common\models\Products::findBySql("SELECT * FROM products WHERE category_id=:categoryId",['categoryId'=> $category_id])->asArray()->all();
        $categories=Categories::find()->all();
        return $this->render('/site/index',['products'=>$products,'categories'=>$categories]);
    }

    public function actionSearch(){
        $search=$_POST['search'];
        $products=\common\models\Products::findBySql("SELECT * FROM products WHERE product_name LIKE '%$search%'")->asArray()->all();
        $categories=Categories::find()->all();
        return $this->render('/site/index',['products'=>$products,'categories'=>$categories]);
    }

}
