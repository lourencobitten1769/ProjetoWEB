<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $product_id
 * @property string $product_name
 * @property string $description
 * @property float $price
 * @property float $size
 * @property int $stock
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
            [['product_name', 'description', 'price', 'size', 'stock', 'category_id'], 'required'],
            [['description'], 'string'],
            [['price', 'size'], 'number'],
            [['stock', 'category_id'], 'integer'],
            [['product_name'], 'string', 'max' => 256],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'category_id']],
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
}
