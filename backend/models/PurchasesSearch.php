<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Purchases;

/**
 * PurchasesSearch represents the model behind the search form of `app\models\Purchases`.
 */
class PurchasesSearch extends Purchases
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['purchase_id', 'quantity', 'user_id'], 'integer'],
            [['total_price'], 'number'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Purchases::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'purchase_id' => $this->purchase_id,
            'total_price' => $this->total_price,
            'quantity' => $this->quantity,
            'date' => $this->date,
            'user_id' => $this->user_id,
        ]);

        return $dataProvider;
    }
}
