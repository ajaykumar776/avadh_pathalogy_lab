<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property int $patient_id
 * @property string $name
 * @property string $mobile
 * @property int $otp
 * @property string|null $address
 * @property string|null $dob
 * @property string|null $email
 * @property string|null $android_id
 * @property string|null $device_model
 * @property int $is_verified
 * @property string $gender
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property string $created_by
 * @property string $updated_by
 * @property string|null $blood_group
 * @property string|null $guardian
 *
 * @property Bill[] $bills
 * @property BookedTests[] $bookedTests
 * @property Report[] $reports
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['name', 'mobile', 'otp', 'is_verified', 'gender', 'created_datetime', 'updated_datetime', 'created_by', 'updated_by'], 'required'],
            [['otp', 'is_verified'], 'integer'],
            [['dob', 'created_datetime', 'updated_datetime'], 'safe'],
            [['name', 'email', 'android_id', 'device_model', 'guardian'], 'string', 'max' => 50],
            [['mobile'], 'string', 'max' => 15],
            [['address'], 'string', 'max' => 100],
            [['gender', 'blood_group'], 'string', 'max' => 10],
            [['created_by', 'updated_by'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'name' => 'Name',
            'mobile' => 'Mobile',
            'otp' => 'Otp',
            'address' => 'Address',
            'dob' => 'Dob',
            'email' => 'Email',
            'android_id' => 'Android ID',
            'device_model' => 'Device Model',
            'is_verified' => 'Is Verified',
            'gender' => 'Gender',
            'created_datetime' => 'Created Datetime',
            'updated_datetime' => 'Updated Datetime',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'blood_group' => 'Blood Group',
            'guardian' => 'Guardian Name',
        ];
    }

    /**
     * Gets query for [[Bills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bill::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[BookedTests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookedTests()
    {
        return $this->hasMany(BookedTests::className(), ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['patient_id' => 'patient_id']);
    }
}
