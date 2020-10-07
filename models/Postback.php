<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "postback".
 *
 * @property int $id
 * @property string|null $cid
 * @property string|null $event
 * @property int|null $campaign_id
 * @property string|null $sub1
 * @property int|null $time
 * @property string|null $update_at
 * @property string|null $create_at
 */
class Postback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'postback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['campaign_id', 'time'], 'integer'],
            [['update_at', 'create_at'], 'safe'],
            [['cid', 'event', 'sub1'], 'string', 'max' => 255],
        ];
    }


    public function getClicks()
    {
        return Postback::find()->where(['campaign_id' => $this->campaign_id])->andWhere(
                ['event' => 'click']
        )->count();
    }

    public function getInstalls()
    {
        return Postback::find()->where(['campaign_id' => $this->campaign_id])->andWhere(
                ['event' => 'install']
        )->count();
    }

    public function getCRi()
    {
        $insstalls = $this->getInstalls();
        if ($insstalls != 0) {
            return $this->getClicks() / $insstalls;
        } else {
            return 0;
        }
    }

    public function getTrials()
    {
        return Postback::find()->where(['campaign_id' => $this->campaign_id])->andWhere(
                ['event' => 'trial_started']
        )->count();
    }

    public function getCRti()
    {
        $trials = $this->getTrials();
        if ($trials != 0) {
            return $this->getInstalls() / $trials;
        } else {
            return 0;
        }
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'event' => 'Event',
            'campaign_id' => 'Campaign ID',
            'sub1' => 'Sub1',
            'time' => 'Time',
            'update_at' => 'Update At',
            'create_at' => 'Create At',
        ];
    }
}
