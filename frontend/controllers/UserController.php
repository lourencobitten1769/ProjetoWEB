<?php

namespace frontend\controllers;
use common\models\user;

class UserController extends \yii\web\Controller
{
    public function actionProfile()
    {
//        $purchases=find()->all(array('conditions' => 'user_id ='.\Yii::$app->user->id));

      $purchases=\common\models\Purchases::findBySql('SELECT purchase_id,date,total_price FROM purchases WHERE user_id=:userId',['userId'=> \Yii::$app->user->id])->asArray()->all();



        return $this->render('userProfile', ['purchases' => $purchases]);
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
