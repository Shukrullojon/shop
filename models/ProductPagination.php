<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_pagination".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $category_id
 */
class ProductPagination extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_pagination';
    }
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['image'], 'string', 'max' => 100],
            [['imageFile'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'category_id' => 'Category ID',
        ];
    }
}
