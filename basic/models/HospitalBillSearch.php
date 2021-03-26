<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HospitalBill;
use yii;
use Yii\app\bill;
use yii\bootstrap\Alert;
use yii\db\Query ;
use app\models\BillItem;
use app\models\BillItemSearch;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Scategory;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Connection;

/**
 * HospitalBillSearch represents the model behind the search form of `app\models\HospitalBill`.
 */
class HospitalBillSearch extends HospitalBill
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'patient_id', 'total_charges', 'paid_amount', 'remaining_amount', 'discount', 'final_amount'], 'integer'],
            [['created_datetime', 'updated_datetime', 'created_by', 'updated_by', 'is_deleted'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        // $query = HospitalBill::find();

        $query = HospitalBill::find()->Where(['<>','remaining_amount',0]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'total_charges' => $this->total_charges,
            'paid_amount' => $this->paid_amount,
            'remaining_amount' => $this->remaining_amount,
            'discount' => $this->discount,
            'final_amount' => $this->final_amount,
            'created_datetime' => $this->created_datetime,
            'updated_datetime' => $this->updated_datetime,
        ]);

        $query->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'is_deleted', $this->is_deleted]);

        return $dataProvider;
    }
    public function search1($params)
    {
        // $query = HospitalBill::find();

        $query = HospitalBill::find()->Where(['=','remaining_amount',0]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'total_charges' => $this->total_charges,
            'paid_amount' => $this->paid_amount,
            'remaining_amount' => $this->remaining_amount,
            'discount' => $this->discount,
            'final_amount' => $this->final_amount,
            'created_datetime' => $this->created_datetime,
            'updated_datetime' => $this->updated_datetime,
        ]);

        $query->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'is_deleted', $this->is_deleted]);

        return $dataProvider;
    }
}
