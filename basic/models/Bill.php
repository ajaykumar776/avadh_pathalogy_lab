<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bill".
 *
 * @property int $bill_id
 * @property int $total_amount
 * @property int $paid_amount
 * @property int $discount
 * @property int $is_paid
 * @property int $dr_commission
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property string $created_by
 * @property string $updated_by
 * @property int $patient_id
 * @property string $bill_url
 * @property string|null $payment_mode
 * @property string|null $transaction_id
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_amount', 'paid_amount', 'discount', 'is_paid', 'dr_commission', 'created_datetime', 'updated_datetime', 'created_by', 'updated_by', 'patient_id', 'bill_url'], 'required'],
            [['total_amount', 'paid_amount', 'discount', 'is_paid', 'dr_commission', 'patient_id'], 'integer'],
            [['created_datetime', 'updated_datetime'], 'safe'],
            [['created_by', 'updated_by'], 'string', 'max' => 20],
            [['bill_url', 'payment_mode', 'transaction_id'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bill_id' => 'Bill ID',
            'total_amount' => 'Total Amount',
            'paid_amount' => 'Paid Amount',
            'discount' => 'Discount',
            'is_paid' => 'Is Paid',
            'dr_commission' => 'Dr Commission',
            'created_datetime' => 'Created Datetime',
            'updated_datetime' => 'Updated Datetime',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'patient_id' => 'Patient ID',
            'bill_url' => 'Bill Url',
            'payment_mode' => 'Payment Mode',
            'transaction_id' => 'Transaction ID',
        ];
    }
}
