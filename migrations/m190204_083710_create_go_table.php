<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%go}}`.
 */
class m190204_083710_create_go_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%go}}', [
            'id' => $this->primaryKey(),
            'description'=>$this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%go}}');
    }
}
