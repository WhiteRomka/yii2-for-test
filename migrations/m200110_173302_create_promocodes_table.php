<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%promocodes}}`.
 */
class m200110_173302_create_promocodes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%promocodes}}', [
            'id' => $this->primaryKey(),
            'promocode' => $this->string(10),
            'started_at' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%promocodes}}');
    }
}
