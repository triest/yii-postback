<?php

    use yii\db\Migration;

    /**
     * Handles the creation of table `{{%postback}}`.
     */
    class m201005_165249_create_postback_table extends Migration
    {
        /**
         * {@inheritdoc}
         */
        public function safeUp()
        {
            $this->createTable(
                    '{{%postback}}',
                    [
                            'id' => $this->primaryKey(),
                            'cid' => $this->string('255')->null()->defaultValue(null),
                            'event' => $this->string('255')->null()->defaultValue(null),
                            'campaign_id' => $this->bigInteger()->null()->defaultValue(null),
                            'sub1' => $this->string('255')->null()->defaultValue(null),
                            'time' => $this->bigInteger()->null()->defaultValue(null),
                            'update_at' => $this->timestamp()->null()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
                            'create_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
                    ]
            );
        }

        /**
         * {@inheritdoc}
         */
        public function safeDown()
        {
            $this->dropTable('{{%postback}}');
        }
    }
