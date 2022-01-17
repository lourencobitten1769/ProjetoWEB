<?php

namespace backend\controllers;

use app\models\Products;
use backend\models\ProductSearch;
use yii\data\ActiveDataProvider;
use yii\db\AfterSaveEvent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Products model.
 */
class ProductController extends Controller
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
                        'delete' => ['GET'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new ProductSearch();
        //$dataProvider = $searchModel->search($this->request->queryParams);

        $products= Products::find();
        //echo json_encode($products);
        $provider= new ActiveDataProvider([
            'query'=>$products,
            'pagination'=>[
                'pageSize'=> 5
            ]
        ]);
        $number_products=Products::find()->count();

        /*return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
       */
        return $this->render('index',['products'=>$provider,'number_products'=>$number_products]);
    }

    /**
     * Displays a single Products model.
     * @param int $product_id Product ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $imageFile= UploadedFile::getInstance($model,'image');
                if(isset($imageFile->size)){
                    $imageFile->saveAs('@frontend/web/images/'.$imageFile->baseName.".".$imageFile->extension);
                }

                $model->image= $imageFile->baseName.".".$imageFile->extension;
                $model->save(false);

                //$model->afterSave(true,$model);

                //return $this->redirect("?r=product%2Fview&product_id=" . $model->product_id);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);


    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $product_id Product ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($product_id)
    {
        if(isset($_POST['submit'])){
            $product= $this->findModel($product_id);
            $quantity= $_POST['quantity'];

            $product->stock=$product->stock + $quantity;

            $product->save(false);

            $products= \app\models\Products::find();
            $provider= new ActiveDataProvider([
                'query'=>$products,
                'pagination'=>[
                    'pageSize'=> 5
                ]
            ]);
            $number_products=Products::find()->count();

            return $this->render('../product/index',['products'=>$provider,'number_products'=>$number_products]);
        }
        else{
            $model = $this->findModel($product_id);

            if ($this->request->isPost && $model->load($this->request->post())) {
                $imageFile= UploadedFile::getInstance($model,'image');
                if(isset($imageFile->size)){
                    $imageFile->saveAs('@frontend/web/images/'.$imageFile->baseName.".".$imageFile->extension);
                }

                $model->image= $imageFile->baseName.".".$imageFile->extension;
                $model->save(false);
                //return $this->redirect(['view', 'product_id' => $model->product_id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $product_id Product ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($product_id)
    {
        $this->findModel($product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $product_id Product ID
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id)
    {
        if (($model = Products::findOne($product_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
