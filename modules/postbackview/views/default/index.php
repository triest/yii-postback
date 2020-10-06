<?

    use app\models\Postback;
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\helpers\Url;
    use yii\widgets\DetailView;
    use yii\widgets\LinkPager;
    use kartik\daterange\DateRangePicker;


    $this->title = "Список импортов";
?>
<p><a class="btn btn-primary" href="/">На главную</a></p>

<?php
    $searchModel = new \app\models\PostbackSeach();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
?>
<?= GridView::widget(
        [
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,

                'columns' => [
                        [
                                'attribute' => 'ID',
                                'label' => 'ID',
                                'value' => function ($model, $key, $index, $column) {
                                    return Html::label($model->campaign_id);
                                },
                                'format' => 'html'
                        ],
                        [
                                'attribute' => 'Clicks ',
                                'label' => 'Clicks',
                                'value' => function ($model, $key, $index, $column) {
                                    return $model->getClicks();
                                },
                                'format' => 'html'
                        ],
                        [
                                'attribute' => 'Installs ',
                                'label' => 'Installs',
                                'value' => function ($model, $key, $index, $column) {
                                    return $model->getInstalls();
                                },
                                'format' => 'html'
                        ],
                        [
                                'attribute' => 'CRi  ',
                                'label' => 'CRi ',
                                'value' => function ($model, $key, $index, $column) {
                                    return $model->getCRi();
                                },
                                'format' => 'html'
                        ],
                        [
                                'attribute' => 'Trials',
                                'label' => 'Trials',
                                'value' => function ($model, $key, $index, $column) {
                                    return $model->getTrials();
                                },
                                'format' => 'html'
                        ],
                        [
                                'attribute' => 'CRti',
                                'label' => 'CRti ',
                                'value' => function ($model, $key, $index, $column) {
                                    return $model->getCRti();
                                },
                                'format' => 'html'
                        ],
                        [
                                'attribute' => 'Date',
                                'label' => 'Data',

                                'value' => function ($model, $key, $index, $column) {
                                    return $model->create_at;
                                },
                                'filter' => DateRangePicker::widget(
                                        [
                                                'model' => $searchModel,
                                                'attribute' => 'create_at',
                                                'convertFormat' => true,
                                                'pluginOptions' => [
                                                        'opens' => 'right',
                                                        'locale' => [
                                                                'cancelLabel' => 'Clear',
                                                                'format' => 'Y-m-d',
                                                        ]
                                                    // 'pluginOptions' => ['locale' => ['format' => 'Y-MM-d']],
                                                ]
                                        ]
                                )
                        ]

                ],

        ]
); ?>



