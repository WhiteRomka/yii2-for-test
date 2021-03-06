<?php

//use Yii;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%country}}`.
 */
class m190810_093312_create_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /*$this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
        ]);*/

        $sql ="CREATE TABLE `country` (
          `code` CHAR(2) NOT NULL PRIMARY KEY,
          `name` CHAR(52) NOT NULL,
          `population` INT(11) NOT NULL DEFAULT '0'
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        Yii::$app->db->createCommand($sql)->execute();

        $sql = "INSERT INTO `country` VALUES ('AU','Australia',24016400);
            INSERT INTO `country` VALUES ('BR','Brazil',205722000);
            INSERT INTO `country` VALUES ('CA','Canada',35985751);
            INSERT INTO `country` VALUES ('CN','China',1375210000);
            INSERT INTO `country` VALUES ('DE','Germany',81459000);
            INSERT INTO `country` VALUES ('FR','France',64513242);
            INSERT INTO `country` VALUES ('GB','United Kingdom',65097000);
            INSERT INTO `country` VALUES ('IN','India',1285400000);
            INSERT INTO `country` VALUES ('RU','Russia',146519759);
            INSERT INTO `country` VALUES ('US','United States',322976000);";

        Yii::$app->db->createCommand($sql)->execute();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('country');
        //$this->dropTable('{{%country}}');
    }
}
