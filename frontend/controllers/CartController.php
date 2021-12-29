<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 3:32 PM
 */

namespace frontend\controllers;


use app\models\Products;
use common\models\CartItem;
use common\models\CartItems;
use common\models\Order;
use common\models\OrderAddress;
use common\models\Product;
use frontend\base\Controller;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use Yii;
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
                    'application/json' => Response::FORMAT_JSON,
                    'application/xml' => Response::FORMAT_XML,
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
                $cartItem->quantity++;
            } else {
                $cartItem = new CartItems();
                $cartItem->product_id = $id;
                $cartItem->created_by = $userId;
                $cartItem->quantity = 1;
            }


            if($cartItem->save()){
                return [
                    'success'=> true
                ];
            } else{
                return [
                    'success'=>false,
                    'errors'=>$cartItem->errors
                ];
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
}