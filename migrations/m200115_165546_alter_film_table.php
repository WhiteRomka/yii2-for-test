<?php

use yii\db\Migration;

/**
 * Class m200115_165546_alter_film_table
 */
class m200115_165546_alter_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('film', 'user_id_affiliate', $this->string(100));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('film', 'user_id_affiliate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200115_165546_alter_film_table cannot be reverted.\n";

        return false;
    }
    */
}
