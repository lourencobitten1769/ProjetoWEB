<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 3:32 PM
 */

namespace frontend\controllers;


use app\models\Products;
use app\models\Purchases;
use Cassandra\Date;
use common\models\CartItem;
use common\models\CartItems;
use common\models\Categories;
use common\models\Order;
use common\models\OrderAddress;
use common\models\Product;
use common\models\Productspurchases;
use frontend\base\Controller;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;


class CartController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            [
                'class'=> ContentNegotiator::class,
                'only' => ['add'],
                'formats' => [

                ],
            ],
            [
                'class' => VerbFilter::class,
                'actions' =>[
                    'delete'=>['POST','DELETE'],
                ]
            ]
        ];
    }

    public function actionIndex(){
        if (Yii::$app->user->isGuest){
            //Get items from session
            $cartItems=Yii::$app->session->get(CartItems::SESSION_KEY,[]);
        }else{
            $cartItems= CartItems::findBySql("
            SELECT c.product_id as id,
            p.image,
            p.product_name,
            p.price,
            c.quantity,
            p.price * c.quantity as total_price
            FROM cart_items c LEFT JOIN products p on p.product_id= c.product_id WHERE c.created_by=:userId",['userId'=> Yii::$app->user->id])
                ->asArray()
                ->all();
        }

        return $this->render('index',[
            'items'=>$cartItems
        ]);
    }

    public function actionAdd($id){
        $product= \common\models\Products::findOne($id);

        if(!$product){
            throw new NotFoundHttpException("Product does not exist");
        }

        if(Yii::$app->user->isGuest){
            //Save in session
            $cartItem=[
                'id'=>$id,
                'name'=> $product->product_name,
                'image'=>$product->image,
                'price'=>$product->price,
                'quantity'=>1,
                'total_price'=>$product->price
            ];
            $cartItems=Yii::$app->session->get(CartItems::SESSION_KEY,[]);
            $cartItems[]=$cartItem;
            Yii::$app->session->set(CartItems::SESSION_KEY,$cartItems);
        }else {
            $userId = Yii::$app->user->id;
            $cartItem = CartItems::find()->userId($userId)->productId($id)->one();
            if ($cartItem) {
                $cartItem->quantity= $cartItem->quantity + $_POST['quantity'];
            } else {
                $cartItem = new CartItems();
                $cartItem->product_id = $id;
                $cartItem->created_by = $userId;
                $cartItem->quantity = $_POST['quantity'];
            }


            if($cartItem->save()){
                $cartItems= CartItems::findBySql("
                SELECT c.product_id as id,
                p.image,
                p.product_name,
                p.price,
                c.quantity,
                p.price * c.quantity as total_price
                FROM cart_items c LEFT JOIN products p on p.product_id= c.product_id WHERE c.created_by=:userId",['userId'=> Yii::$app->user->id])
                    ->asArray()
                    ->all();
                return $this->render('index',['items'=>$cartItems]);


            }
        }

    }

    public function actionDelete($id){
        if(Yii::$app->user->isGuest){
            $cartItems=Yii::$app->session->get(CartItems::SESSION_KEY,[]);
            foreach ($cartItems as $i=>$cartItem) {
                if($cartItem['id']==$id){
                    array_splice($cartItems,$i,1);
                    break;
                }
            }
            Yii::$app->session->set(CartItems::SESSION_KEY,$cartItems);
        }else{
            CartItems::deleteAll(['product_id'=>$id,'created_by'=>Yii::$app->user->id]);
            return $this->redirect(['index']);
        }
    }

    public function actionConfirm(){
        $cartItems= CartItems::findBySql("
            SELECT c.product_id as id,
            p.image,
            p.product_name,
            p.price,
            c.quantity,
            p.price * c.quantity as total_price
            FROM cart_items c LEFT JOIN products p on p.product_id= c.product_id WHERE c.created_by=:userId",['userId'=> Yii::$app->user->id])
            ->asArray()
            ->all();

        return $this->render('confirm', ['items'=>$cartItems] );
    }

    /**
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionPayment($precoCompra)
    {
        $cartItems = CartItems::findBySql("
            SELECT c.product_id as id,
            p.image,
            p.product_name,
            p.price,
            c.quantity,
            p.price * c.quantity as total_price
            FROM cart_items c LEFT JOIN products p on p.product_id= c.product_id WHERE c.created_by=:userId", ['userId' => Yii::$app->user->id])
            ->asArray()
            ->all();

        $purchase = new \common\models\Purchases();
        date_default_timezone_set('Europe/Lisbon');
        $purchase->total_price = $precoCompra;
        $purchase->date = date('Y-m-d H:i:s');
        $purchase->user_id= Yii::$app->user->id;

        $purchase->save();

        foreach ($cartItems as $cartItem){
            $productPurchases= new Productspurchases();

            $productPurchases->product_id= $cartItem['id'];
            $productPurchases->purchase_id=$purchase->purchase_id;
            $productPurchases->quantity=$cartItem['quantity'];

            $product= \common\models\Products::findOne($cartItem['id']);
            $product->stock=$product->stock - $cartItem['quantity'];
            $product->save();
            $productPurchases->save();

            CartItems::deleteAll('created_by=' . Yii::$app->user->id);

        }

        sleep(5);


        $products=\common\models\Products::find()->all();
        $categories=Categories::find()->all();
        $total=\common\models\Products::find()->count();



        return $this->render('/site/index',['total'=>$total, 'products'=>$products, 'categories'=>$categories]);
    }
}