<?php

use yii\db\Migration;

/**
 * Class m200110_173810_alter_promocodes_add_column__expired_at
 */
class m200110_173810_alter_promocodes_add_column__expired_at extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('promocodes', 'expired_at',$this->dateTime().' AFTER `started_at`');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('promocodes', 'expired_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_173810_alter_promocodes_add_column__expired_at cannot be reverted.\n";

        return false;
    }
    */
}
