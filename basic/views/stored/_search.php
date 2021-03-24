<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Stored;

/**
 * StoredSearch represents the model behind the search form of `app\models\Stored`.
 */
class StoredSearch extends Stored
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'doctor_id', 'category_id', 'created_by'], 'integer'],
            [['created_datetime', 'updated_datetime', 'updated_by'], 'safe'],
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
        $query = Stored::find();

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
            'doctor_id' => $this->doctor_id,
            'category_id' => $this->category_id,
            'created_datetime' => $this->created_datetime,
            'updated_datetime' => $this->updated_datetime,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}