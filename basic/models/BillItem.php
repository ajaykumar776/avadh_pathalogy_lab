<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bill_item".
 *
 * @property int $id
 * @property int $hospital_bill_id
 * @property int $category_id
 * @property int $amount
 * @property int $quantity
 * @property int $unit_rate
 * @property int $doctor_id
 * @property int $subcategory_id
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property string $created_by
 * @property string $updated_by
 */
class BillItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bill_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hospital_bill_id', 'category_id', 'amount', 'quantity', 'unit_rate', 'doctor_id', 'subcategory_id', 'created_datetime', 'updated_datetime', 'created_by', 'updated_by'], 'required'],
            [['hospital_bill_id', 'category_id', 'amount', 'quantity', 'unit_rate', 'doctor_id', 'subcategory_id'], 'integer'],
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
            'hospital_bill_id' => 'Hospital Bill ID',
            'category_id' => 'Category',
            'amount' => 'Amount',
            'quantity' => 'Quantity',
            'unit_rate' => 'Unit Rate',
            'doctor_id' => 'Doctor',
            'subcategory_id' => 'Subcategory',
            'created_datetime' => 'Created Datetime',
            'updated_datetime' => 'Updated Datetime',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
