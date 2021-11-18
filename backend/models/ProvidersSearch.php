<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Providers;

/**
 * ProvidersSearch represents the model behind the search form of `app\models\Providers`.
 */
class ProvidersSearch extends Providers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['providers_id', 'nif'], 'integer'],
            [['provider_name'], 'safe'],
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
        $query = Providers::find();

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
            'providers_id' => $this->providers_id,
            'nif' => $this->nif,
        ]);

        $query->andFilterWhere(['like', 'provider_name', $this->provider_name]);

        return $dataProvider;
    }
}
