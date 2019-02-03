<?php

namespace app\models;

use Yii;
use app\models\Category;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property double $price
 * @property double $price_last
 * @property double $price_percent
 * @property double $together
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $category_id
 * @property int $like
 * @property int $count_view
 * @property int $number
 */
class Product extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public $imageFile;

    public function rules()
    {
        return [
            [['name', 'price', 'title', 'description', 'image', 'category_id', 'number'], 'required'],
            [['price', 'price_last', 'price_percent', 'together'], 'number'],
            [['description'], 'string'],
            [['like', 'count_view', 'number'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['title', 'image'], 'string', 'max' => 255],
            [['category_id'], 'string', 'max' => 11],
            [['imageFile'], 'file'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            return true;
        } else {
            return false;
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'price' => 'Narxi',
            'price_last' => 'Chegirma narxi',
            'price_percent' => 'Arzonlashtirilgan %',
            'together' => 'Birgalikda',
            'title' => 'Sarlavha',
            'description' => 'Mazmuni',
            'image' => 'Rasmi',
            'category_id' => 'Kategoriyasi',
            'like' => 'Like',
            'count_view' => 'Ko\'rishlar soni',
            'number' => 'Mahsulot soni',
        ];
    }

    public function getCategory(){
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }
}
