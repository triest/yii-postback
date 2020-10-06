<?php


    namespace app\controllers;


    use app\builder\PostbackBuilder;
    use app\models\Postback;
    use Yii;
    use yii\data\ActiveDataProvider;
    use yii\web\Controller;

    class PostbackApiController extends Controller
    {
        public function actionIndex()
        {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $query = Postback::find();
            $request = Yii::$app->request;

            $campaign_id = $request->get("filter");

            $group_by = $request->get("group_by");


            $query->andFilterWhere(['!=', 'campaign_id', null]);


            $create_from = $request->get("create_from");
            $create_to = $request->get("create_to");

            $separated = explode(' - ', $create_from);



            if ($create_from != null) {
                $query->andFilterWhere(
                        [ ">=",'create_at' ,$create_from. " 00:00:00"]
                );
            }

            if ($create_to != null) {
                $query->andFilterWhere(
                        [ "<=",'create_at' ,$create_to. " 23:59:59"]
                );
            }

            if ($campaign_id != null) {
                $query->andFilterWhere(['campaign_id' => $this->campaign_id]);
            }
            if ($group_by == "campaign_id") {
                $query->groupBy('campaign_id');
            }

            return $query->all();
        }
    }