<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m190727_143124_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'text' => $this->text(),
            'author_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fkey-author_id-user_id',
            'post',
            'author_id',
            'user',
            'id',
            'SET NULL',
            'CASCADE'
            );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fkey-author_id-user_id', 'post');
        $this->dropTable('{{%post}}');
    }
}
