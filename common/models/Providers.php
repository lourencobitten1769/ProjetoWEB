<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "providers".
 *
 * @property int $providers_id
 * @property string $provider_name
 * @property int $nif
 */
class Providers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'providers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['provider_name', 'nif'], 'required'],
            [['nif'], 'integer'],
            [['provider_name'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'providers_id' => 'Providers ID',
            'provider_name' => 'Provider Name',
            'nif' => 'Nif',
        ];
    }
}
