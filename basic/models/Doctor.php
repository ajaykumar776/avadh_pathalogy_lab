<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property int $doctor_id
 * @property string $name
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $degree
 * @property int $commission_in_percent
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property string $created_by
 * @property string $updated_by
 *
 * @property Report[] $reports
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'commission_in_percent', 'created_datetime', 'updated_datetime', 'created_by', 'updated_by'], 'required'],
            [['commission_in_percent'], 'integer'],
            [['created_datetime', 'updated_datetime'], 'safe'],
            [['name', 'email', 'degree'], 'string', 'max' => 50],
            [['mobile'], 'string', 'max' => 15],
            [['created_by', 'updated_by'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'Doctor ID',
            'name' => 'Doctor Name',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'degree' => 'Degree',
            'commission_in_percent' => 'Commission In Percent',
            'created_datetime' => 'Created Datetime',
            'updated_datetime' => 'Updated Datetime',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['doctor_id' => 'doctor_id']);
    }
}
