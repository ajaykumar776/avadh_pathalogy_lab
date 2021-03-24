<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subcategory".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property int $amount
 * @property string $description
 * @property string $created_datetime
 * @property string $updated_datetime
 * @property string $created_by
 * @property string $updated_by
 */
class Scategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'amount', 'description', 'created_datetime', 'updated_datetime', 'created_by', 'updated_by'], 'required'],
            [['category_id', 'amount'], 'integer'],
            [['created_datetime', 'updated_datetime'], 'safe'],
            [['name', 'description', 'created_by', 'updated_by'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Subcategory Name',
            'category_id' => 'Category Id',
            'amount' => 'Amount',
            'description' => 'Description',
            'created_datetime' => 'Created Datetime',
            'updated_datetime' => 'Updated Datetime',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
