<?php


    namespace app\controllers;


    use app\builder\PostbackBuilder;
    use app\models\Postback;
    use Symfony\Component\Filesystem\Exception\IOException;
    use Yii;
    use yii\data\ActiveDataProvider;
    use yii\web\Controller;

    class PostbackApiController extends Controller
    {
        public function actionIndex()
        {
            $request = Yii::$app->request;

            $connection = Yii::$app->getDb();
            $commandSql = "select postback.campaign_id as \"id\",
(select count(*) from postback postback1 where postback1.campaign_id=postback.campaign_id and postback1.event=\"click\") as \"clicks\",
(select count(*) from postback postback1 where postback1.campaign_id=postback.campaign_id and postback1.event=\"install\") as \"installs\",
((select count(*) from postback postback1 where postback1.campaign_id=postback.campaign_id and postback1.event=\"clicks\")/(select count(*) from postback postback1 where postback1.campaign_id=postback.campaign_id and postback1.event=\"installs\")) as \"CRi\",
(select count(*) from postback postback1 where postback1.campaign_id=postback.campaign_id and postback1.event=\"trial_started\") as \"trials\",
(select count(*) from postback postback1 where postback1.campaign_id=postback.campaign_id and postback1.event=\"install\")/(select count(*) from postback postback1 where postback1.campaign_id=postback.campaign_id and postback1.event=\"trial_started\") as \"CRti\",
postback.create_at as \"date\"
from postback postback where campaign_id is not NULL";


            $create_from = $request->get("create_from");

            if ($create_from != null) {
                $commandSql .= " and create_at>=\"$create_from\"";
            }

            $create_to = $request->get("create_to");

            if ($create_to != null) {
                $commandSql .= " and create_at<=\"$create_to\"";
            }

            $filter_camping = $request->get("filter_camping");

            if ($filter_camping != null) {
                $commandSql .= "and postback.campaign_id=\"" . $filter_camping . "\"";
                }

            $group_by = trim($request->get("group_by"));

            if($group_by!=null){
                $commandSql.=" group by $group_by";
            }

        

            $command = $connection->createCommand(
                    $commandSql
            );

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            try {
                $result = $command->queryAll();
            }catch (\Exception $exception){
                return "error in sql";
            }

            return $result;
        }
    }