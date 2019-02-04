<?php

namespace app\models;

use Yii;

class Go extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'go';
    }

    public function rules()
    {
        return [
            [['description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Mazmuni',
        ];
    }
}
