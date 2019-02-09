<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $address
 * @property int $status
 * @property string $pay
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone_number', 'address', 'pay'], 'required'],
            [['address'], 'string'],
            [['status'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['phone_number', 'pay'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Ism',
            'last_name' => 'Familya',
            'phone_number' => 'Telefon raqam',
            'address' => 'Address',
            'status' => 'Status',
            'pay' => 'To\'lov turi',
        ];
    }
}
