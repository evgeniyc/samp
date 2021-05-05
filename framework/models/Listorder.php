<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "listorder".
 *
 * @property int $id
 * @property int $order_id id заказа
 * @property int $prod_id id товара
 * @property int $quant Количество
 * @property int $price Цена
 */
class Listorder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'listorder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'prod_id', 'quant', 'price'], 'required'],
            [['order_id', 'prod_id', 'quant', 'price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'prod_id' => 'Prod ID',
            'quant' => 'Quant',
            'price' => 'Price',
        ];
    }
}
