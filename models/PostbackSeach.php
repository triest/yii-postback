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

        public $start_date;
        public $end_date;

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

            $dataProvider = new ActiveDataProvider(
                    [
                            'query' => $query,
                    ]
            );

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere(['!=', 'campaign_id', null]);

            // grid filtering conditions
            $query->andFilterWhere(
                    [
                            'id' => $this->id,
                            'campaign_id' => $this->campaign_id,
                            'time' => $this->time,
                            'update_at' => $this->update_at,
                        //   'create_at' => $this->create_at,
                    ]
            );


            $separated = explode(' - ', $this->create_at);


            /* $query->andFilterWhere(['like', 'cid', $this->cid])
                      ->andFilterWhere(['like', 'event', $this->event])
                      ->andFilterWhere(['like', 'sub1', $this->sub1]);

            */
            if ($this->create_at != null) {
                $query->andFilterWhere(
                        ['between', 'create_at', $separated[0] . " 00:00:00", $separated[1] . " 23:59:59"]
                );
            }
            $query->groupBy('campaign_id');

            return $dataProvider;
        }
    }
