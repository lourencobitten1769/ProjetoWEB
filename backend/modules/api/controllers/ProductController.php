<?php

namespace app\modules\api\controllers;

use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class ProductController extends ActiveController
{
    public $modelClass='app\models\Products';

    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }*/

    public function actionTotal()
    {
        $prodmodel = new $this->modelClass;
        $recs = $prodmodel::find()->all();
        return ['total' => count($recs)];
    }

    public function actionProdutoscategoria($id)
    {
        $prodmodel = new $this->modelClass;
        $recs=$prodmodel::findBySql("SELECT * FROM products WHERE category_id=$id")->all();
        return ['produtoscategoria'=>$recs];
    }

    /*public function auth($username, $password)
    {
        $user = \common\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password))
        {
            return $user;
        }
    }*/

}
