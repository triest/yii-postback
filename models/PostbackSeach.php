<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Postback;

/**
 * PostbackSeach represents the model behind the search form of `app\models\Postback`.
 */
class PostbackSeach extends Postback
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'campaign_id', 'time'], 'integer'],
            [['cid', 'event', 'sub1', 'update_at', 'create_at'], 'safe'],
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
        $query = Postback::find();

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
            'id' => $this->id,
            'campaign_id' => $this->campaign_id,
            'time' => $this->time,
            'update_at' => $this->update_at,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'event', $this->event])
            ->andFilterWhere(['like', 'sub1', $this->sub1]);

        return $dataProvider;
    }
}
