<?php

namespace app\modules\api\controllers;



use common\models\LoginForm;
use frontend\models\SignupForm;
use yii\filters\auth\HttpBasicAuth;
use Yii;

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

    public function actionRegister(){
        $model=new SignupForm();

        $model->username=Yii::$app->request->post('username');
        $model->email=Yii::$app->request->post('email');
        $model->morada=Yii::$app->request->post('morada');
        $model->nif=Yii::$app->request->post('nif');
        $model->password=Yii::$app->request->post('password');



        if($model->signup())
        {
            return $model->username;
        }
        else{
            return null;
        }

    }
}


