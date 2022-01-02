<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productspurchases".
 *
 * @property int $productPurchase_id
 * @property int $product_id
 * @property int $purchase_id
 * @property int $quantity
 *
 * @property Products $product
 * @property Purchases $purchase
 */
class Productspurchases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productspurchases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'purchase_id', 'quantity'], 'required'],
            [['product_id', 'purchase_id', 'quantity'], 'integer'],
            [['purchase_id'], 'exist', 'skipOnError' => true, 'targetClass' => Purchases::className(), 'targetAttribute' => ['purchase_id' => 'purchase_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'product_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'productPurchase_id' => 'Product Purchase ID',
            'product_id' => 'Product ID',
            'purchase_id' => 'Purchase ID',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['product_id' => 'product_id']);
    }

    /**
     * Gets query for [[Purchase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchase()
    {
        return $this->hasOne(Purchases::className(), ['purchase_id' => 'purchase_id']);
    }
}
