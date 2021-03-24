<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receipt".
 *
 * @property int $id
 * @property int $bill_id
 * @property int $amount
 * @property string $payment_mode
 * @property int $transaction_id
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property string $created_by
 * @property string $updated_by
 * @property string $is_deleted
 */
class Receipt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receipt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bill_id', 'amount', 'payment_mode', 'transaction_id', 'created_datetime', 'updated_datetime', 'created_by', 'updated_by', 'is_deleted'], 'required'],
            [['bill_id', 'amount', 'transaction_id'], 'integer'],
            [['created_datetime', 'updated_datetime'], 'safe'],
            [['payment_mode', 'created_by', 'updated_by', 'is_deleted'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bill_id' => 'Bill ID',
            'amount' => 'Amount',
            'payment_mode' => 'Payment Mode',
            'transaction_id' => 'Transaction ID',
            'created_datetime' => 'Created Datetime',
            'updated_datetime' => 'Updated Datetime',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
