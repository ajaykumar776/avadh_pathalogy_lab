<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BillItem;

/**
 * BillItemSearch represents the model behind the search form of `app\models\BillItem`.
 */
class BillItemSearch extends BillItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hospital_bill_id', 'category_id', 'amount', 'quantity', 'unit_rate', 'doctor_id', 'subcategory_id'], 'integer'],
            [['created_datetime', 'updated_datetime', 'created_by', 'updated_by'], 'safe'],
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
        $query = BillItem::find();

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
            'hospital_bill_id' => $this->hospital_bill_id,
            'category_id' => $this->category_id,
            'amount' => $this->amount,
            'quantity' => $this->quantity,
            'unit_rate' => $this->unit_rate,
            'doctor_id' => $this->doctor_id,
            'subcategory_id' => $this->subcategory_id,
            'created_datetime' => $this->created_datetime,
            'updated_datetime' => $this->updated_datetime,
        ]);

        $query->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
