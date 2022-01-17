<?php

namespace app\modules\api\controllers;

use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class ProductspurchasesController extends ActiveController
{
    public $modelClass='common\models\ProductsPurchases';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    public function actionProductsbypurchase($id){
        $purchmodel = new $this->modelClass;
        $recs= $purchmodel::findBySql("SELECT * FROM productspurchases WHERE purchase_id= $id");
        return ['produtoscpurchase'=>$recs];
    }
    public function auth($username, $password)
    {
        $user = \common\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password))
        {
            return $user;
        }
    }
}


