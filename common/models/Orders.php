<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $order_id
 * @property int $quantidade
 *
 * @property Productsorders[] $productsorders
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantidade'], 'required'],
            [['quantidade'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[Productsorders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsorders()
    {
        return $this->hasMany(Productsorders::className(), ['order_id' => 'order_id']);
    }
}
