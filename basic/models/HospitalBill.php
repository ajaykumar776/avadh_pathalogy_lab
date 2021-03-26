<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hospital_bill".
 *
 * @property int $id
 * @property int $patient_id
 * @property int $total_charges
 * @property int $paid_amount
 * @property int $remaining_amount
 * @property int $discount
 * @property int $final_amount
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property string $created_by
 * @property string $updated_by
 * @property string $is_deleted
 */
class HospitalBill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $payment_mode ;
    public $transaction_id ;


    public static function tableName()
    {
        return 'hospital_bill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id', 'total_charges', 'paid_amount', 'remaining_amount', 'discount', 'final_amount', 'created_datetime', 'updated_datetime', 'created_by', 'updated_by', 'is_deleted'], 'required'],
            [['patient_id', 'total_charges', 'paid_amount', 'remaining_amount', 'discount', 'final_amount'], 'integer'],
            [['created_datetime', 'updated_datetime'], 'safe'],
            [['created_by', 'updated_by', 'is_deleted','payment_mode','transaction_id'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'Patient ID',
            'total_charges' => 'Total Charges',
            'paid_amount' => 'Paid Amount',
            'remaining_amount' => 'Remaining Amount',
            'discount' => 'Discount',
            'final_amount' => 'Final Amount',
            'created_datetime' => 'Created Datetime',
            'updated_datetime' => 'Updated Datetime',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
