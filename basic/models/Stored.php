<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stored_commission".
 *
 * @property int $id
 * @property int $doctor_id
 * @property int $category_id
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property int $created_by
 * @property string $updated_by
 */
class Stored extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stored_commission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'category_id', 'created_datetime', 'updated_datetime', 'created_by', 'updated_by'], 'required'],
            [['doctor_id', 'category_id', 'created_by'], 'integer'],
            [['created_datetime', 'updated_datetime'], 'safe'],
            [['updated_by'], 'string', 'max' => 100],
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
            'category_id' => 'Category ID',
            'created_datetime' => 'Created Datetime',
            'updated_datetime' => 'Updated Datetime',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
