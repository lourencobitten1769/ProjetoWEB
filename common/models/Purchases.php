<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purchases".
 *
 * @property int $purchase_id
 * @property float $total_price
 * @property string $date
 * @property int $user_id
 *
 * @property Productspurchases[] $productspurchases
 * @property User $user
 */
class Purchases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_price', 'date', 'user_id'], 'required'],
            [['total_price'], 'number'],
            [['user_id'], 'integer'],
            [['date'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'purchase_id' => 'Purchase ID',
            'total_price' => 'Total Price',
            'date' => 'Date',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Productspurchases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductspurchases()
    {
        return $this->hasMany(Productspurchases::className(), ['purchase_id' => 'purchase_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function setTotalPrice($totalPrice)
    {
        $this->total_price=$totalPrice;
    }

    public function setDate($date)
    {
        $this->date=$date;
    }

    public function setUserId($userId)
    {
        $this->user_id=$userId;
    }
}
