<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $order_date
 * @property int $client_id
 * @property int $check_code
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    public function rules()
    {
        return [
            [['client_id', 'check_code'], 'required'],
            [['client_id', 'check_code'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_date' => 'Order Date',
            'client_id' => 'Client ID',
            'check_code' => 'Check Code',
        ];
    }
}
