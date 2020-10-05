<?php


    namespace app\controllers;


    use app\builder\PostbackBuilder;
    use app\models\Postback;
    use Yii;
    use yii\web\Controller;

    class PostbackController extends Controller
    {
        public function actionIndex()
        {
            $request = Yii::$app->request;
            $cid = $request->get("cid");
            $campaign_id = $request->get("campaign_id");
            $time = $request->get("time");
            $event = $request->get("event");
            $sub1 = $request->get("sub1");
            $postBuckBuilder=new PostbackBuilder();
            $postBuckBuilder->setCid($cid);
            $postBuckBuilder->setCampaignId($campaign_id);
            $postBuckBuilder->setTime($time);
            $postBuckBuilder->setEvent($event);
            $postBuckBuilder->setSub1($sub1);
            $posrback=$postBuckBuilder->getResult();
        }
    }