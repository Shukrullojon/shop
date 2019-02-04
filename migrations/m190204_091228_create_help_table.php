<?php

use yii\db\Migration;

class m190204_091228_create_help_table extends Migration
{   public function safeUp()
    {
        $this->createTable('{{%help}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(255),
            'description'=>$this->text(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%help}}');
    }
}
