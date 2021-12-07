<?php

namespace backend\controllers;

use app\models\Providers;
use backend\models\ProvidersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProviderController implements the CRUD actions for Providers model.
 */
class ProviderController extends Controller
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
     * Lists all Providers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $providers= Providers::find()->all();
        $number_providers=Providers::find()->count();
        return $this->render('index', ['providers' => $providers,'number_providers'=>$number_providers]);
    }

    /**
     * Displays a single Providers model.
     * @param int $providers_id Providers ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($providers_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($providers_id),
        ]);
    }

    /**
     * Creates a new Providers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Providers();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'providers_id' => $model->providers_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Providers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $providers_id Providers ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($providers_id)
    {
        $model = $this->findModel($providers_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'providers_id' => $model->providers_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Providers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $providers_id Providers ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($providers_id)
    {
        $this->findModel($providers_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Providers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $providers_id Providers ID
     * @return Providers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($providers_id)
    {
        if (($model = Providers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
