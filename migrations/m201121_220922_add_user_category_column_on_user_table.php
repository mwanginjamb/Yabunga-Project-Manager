<?php

use yii\db\Migration;

/**
 * Class m201121_220922_add_user_category_column_on_user_table
 */
class m201121_220922_add_user_category_column_on_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}','user_type',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}','user_type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201121_220922_add_user_category_column_on_user_table cannot be reverted.\n";

        return false;
    }
    */
}
