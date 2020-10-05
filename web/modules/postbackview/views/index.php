<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostbackSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Postbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postback-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Postback', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cid',
            'event',
            'campaign_id',
            'sub1',
            //'time:datetime',
            //'update_at',
            //'create_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
