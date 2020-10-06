<?php

namespace app\modules\postbackview\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `PostbackView` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
                'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index'],
                        'rules' => [
                                [
                                        'allow' => true,
                                        'roles' => ['@'],
                                ],
                        ],
                ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
