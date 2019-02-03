<?php

namespace app\models;

use Yii;
use app\models\Product;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['part'], 'integer'],
            [['name', 'icon'], 'string', 'max' => 30],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'icon' => 'Icon',
            'part' => 'Part',
        ];
    }
    public function getProduct(){
        return $this->hasMany(Product::className(),['category_id'=>'id']);
    }
}
