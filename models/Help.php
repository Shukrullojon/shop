<?php

namespace app\models;

use Yii;


class Help extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'help';
    }

    public function rules()
    {
        return [
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Qisqacha',
            'description' => 'Izox',
        ];
    }
}
