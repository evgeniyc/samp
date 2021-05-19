<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $user
 * @property string|null $status
 * @property string|null $date
 * @property int $amount
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user'], 'required'],
            [['user', 'amount'], 'integer'],
            [['status'], 'string'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'Пользователь',
            'status' => 'Статус заказа',
            'date' => 'Дата создания',
            'amount' => 'Сумма',
        ];
    }
	
	public function getList()
    {
        return $this->hasMany(Listorder::className(), ['order_id' => 'id']);
    }
}
