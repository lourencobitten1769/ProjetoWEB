<?php

namespace app\modules\api\controllers;



use common\models\LoginForm;
use yii\filters\auth\HttpBasicAuth;

/**
 * Default controller for the `api` module
 */
class UserController extends \yii\rest\ActiveController
{
    public $modelClass='app\models\User';

    public function actionLogin(){

        $model=new LoginForm();

        $model->username=\Yii::$app->request->post('username');
        $model->password=\Yii::$app->request->post('password');


        if($model->login())
        {
            return $model->username;
        }
        else{
            return null;
        }


    }
}


