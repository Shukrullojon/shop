<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m190209_132557_create_client_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'first_name'=>$this->string(50)->notNull(),
            'last_name'=>$this->string(50)->notNull(),
            'phone_number'=>$this->string(20)->notNull(),
            'address'=>$this->text()->notNull(),
            'status'=>$this->integer(1)->notNull(),
            'pay'=>$this->string(20)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client}}');
    }
}
