<?php

namespace backend\controllers;

use app\models\Purchases;
use app\models\PurchasesSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PurchaseController implements the CRUD actions for Purchases model.
 */
class PurchaseController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Purchases models.
     * @return mixed
     */
    public function actionIndex()
    {
        $purchases= Purchases::find();
        $provider= new ActiveDataProvider([
            'query'=>$purchases,
            'pagination'=>[
                'pageSize'=> 5
            ]
        ]);
        $number_purchases=Purchases::find()->count();
        return $this->render('index', ['purchases' => $provider,'number_purchases'=>$number_purchases]);

    }

    /**
     * Displays a single Purchases model.
     * @param int $purchase_id Purchase ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($purchase_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($purchase_id),
        ]);
    }

    /**
     * Creates a new Purchases model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Purchases();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'purchase_id' => $model->purchase_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Purchases model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $purchase_id Purchase ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($purchase_id)
    {
        $model = $this->findModel($purchase_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'purchase_id' => $model->purchase_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Purchases model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $purchase_id Purchase ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($purchase_id)
    {
        $this->findModel($purchase_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Purchases model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $purchase_id Purchase ID
     * @return Purchases the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($purchase_id)
    {
        if (($model = Purchases::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
