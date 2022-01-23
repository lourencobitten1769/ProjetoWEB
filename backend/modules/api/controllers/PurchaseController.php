<?php

namespace app\modules\api\controllers;

use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class PurchaseController extends ActiveController
{
    public $modelClass='app\models\Purchases';

    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }*/

    public function actionPurchaseuser($id){
        $purchasesModel= new $this->modelClass;
        $rec= $purchasesModel::findBySql("SELECT * FROM purchases WHERE user_id= $id")->all();
        return ['getpurchasesuser'=> $rec];
    }

    public function actionLastpurchase(){
        $purchaseModel= new $this->modelClass;
        $modelForSlip = $purchaseModel::find()->orderBy(['purchase_id'=> SORT_DESC])->one();
        return $modelForSlip;
    }


    /*public function auth($username, $password)
    {
        $user = \common\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password))
        {
            return $user;
        }
    }
*/
}
