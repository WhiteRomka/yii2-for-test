<?php

use yii\db\Migration;
use app\models\User;

/**
 * Class m191003_121748_alter_user_table_add_accessToken
 */
class m191003_121748_alter_user_table_add_accessToken extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'access_token', $this->string(100));
        $users = User::find()->all();
        if ($users) {
            echo "Finds " . count($users) . " users\r\n";
            echo "Initiate procedure update users\r\n";
            $successUpdate = 0;
            $errorUpdate = 0;
            /** @var User $user */
            foreach ($users as $user) {
                $user->setAccessTokenAs();
                if ($user->save(false)) {
                    $successUpdate++;
                    echo '.';
                } else {
                    $errorUpdate++;
                    echo 'F';
                }
            }
            echo "\r\n";
            echo "Finished procedure update users\r\n";
            echo "Success user update = $successUpdate\r\n";
            echo "Error user update = $errorUpdate\r\n";
        }


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //ALTER TABLE user DROP COLUMN access_token;
        $this->dropColumn('user','access_token');
    }

}
