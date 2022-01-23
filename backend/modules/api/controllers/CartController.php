<?php

namespace app\modules\api\controllers;

use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class CartController extends ActiveController
{
    public $modelClass='common\models\CartItems';

    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }*/

    public function actionCartuser($id){
        $cartmodel= new $this->modelClass;
        $recs=$cartmodel::findBySql("SELECT * FROM cart_items WHERE created_by= $id")->all();
        return ['cartuser'=>$recs];
    }

    public function actionDeletecartuser($id){
        $cartmodel=new $this->modelClass;
        $recs=$cartmodel::findBySql("DELETE FROM cart_items WHERE created_by= $id")->all();
        return ['cartuser'=>$recs];
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

