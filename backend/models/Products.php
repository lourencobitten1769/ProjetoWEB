<?php

namespace app\models;

//require('vendor/autoload.php');

use Bluerhinos\phpMQTT;
use \PhpMqtt\Client\MqttClient;
use \PhpMqtt\Client\ConnectionSettings;


/**
 * This is the model class for table "products".
 *
 * @property int $product_id
 * @property string $product_name
 * @property string $description
 * @property float $price
 * @property float $size
 * @property int $stock
 * @property string $image
 * @property int $category_id
 *
 * @property Categories $category
 * @property Productsorders[] $productsorders
 * @property Productspurchases[] $productspurchases
 */

class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_name', 'description', 'price', 'stock', 'image', 'category_id'], 'required'],
            [['description'], 'string'],
            [['price', 'size'], 'number'],
            [['stock', 'category_id'], 'integer'],
            [['product_name', 'image'], 'string', 'max' => 256],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['image'],'file','extensions'=>'jpg,png,gif','skipOnEmpty'=>false]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'description' => 'Description',
            'price' => 'Price',
            'size' => 'Size',
            'stock' => 'Stock',
            'image' => 'Image',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['category_id' => 'category_id']);
    }

    /**
     * Gets query for [[Productsorders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsorders()
    {
        return $this->hasMany(Productsorders::className(), ['product_id' => 'product_id']);
    }

    /**
     * Gets query for [[Productspurchases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductspurchases()
    {
        return $this->hasMany(Productspurchases::className(), ['product_id' => 'product_id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub

        //Obter dados do registo em causa
        $id=$this->product_id;
        $name=$this->product_name;
        $description=$this->description;
        $price=$this->price;
        $size=$this->size;
        $stock=$this->stock;
        $image=$this->image;
        $category_id=$this->category_id;

        $myObj=new Products();
        $myObj->product_id=$id;
        $myObj->product_name=$name;
        $myObj->description=$description;
        $myObj->price=$price;
        $myObj->size=$size;
        $myObj->stock=$stock;
        $myObj->image=$image;
        $myObj->category_id=$category_id;

        $myJSON=json_encode($myObj->product_name);

        if($insert)
            $this->FazPublish("INSERT",$myJSON);

        else
            $this->FazPublish("UPDATE",$myJSON);
    }

    public function FazPublish($canal,$msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = "root"; // set your username
        $password = ""; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password))
        {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        else { file_put_contents("debug.output","Time out!"); }
}

}
