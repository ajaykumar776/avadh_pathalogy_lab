<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor_commission".
 *
 * @property int $id
 * @property int $doctor_id
 * @property int $bill_item_id
 * @property int $commission
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property string $created_by
 * @property string $updated_by
 */
class Dcommission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor_commission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'bill_item_id', 'commission', 'created_datetime', 'updated_datetime', 'created_by', 'updated_by'], 'required'],
            [['doctor_id', 'bill_item_id', 'commission'], 'integer'],
            [['created_datetime', 'updated_datetime'], 'safe'],
            [['created_by', 'updated_by'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctor_id' => 'Doctor ID',
            'bill_item_id' => 'Bill Item ID',
            'commission' => 'Commission',
            'created_datetime' => 'Created Datetime',
            'updated_datetime' => 'Updated Datetime',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
