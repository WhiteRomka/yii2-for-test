<?php

use yii\db\Migration;

/**
 * Class m190810_090531_alter_country_table
 */
class m190810_090531_alter_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('country', 'active', $this->boolean());
        $this->addCommentOnColumn('country', 'active', 'активность');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('country', 'active');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190810_090531_alter_country_table cannot be reverted.\n";

        return false;
    }
    */
}
