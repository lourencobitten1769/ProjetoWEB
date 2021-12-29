<?php

namespace frontend\controllers;
use common\models\user;

class UserController extends \yii\web\Controller
{
    public function actionProfile()
    {
        return $this->render('userProfile');
    }

    public function actionUpdate($id){
        $user= User::findOne($id);
        $user->username=$_POST['username'];
        $user->email=$_POST['email'];
        $user->morada= $_POST['morada'];
        $user->nif=$_POST['nif'];
        $user->save();

        return $this->render('userProfile');

    }

}
