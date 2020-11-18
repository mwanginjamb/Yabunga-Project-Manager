<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Appraisalcalendar;

/**
 * AppraisalcalendarSearch represents the model behind the search form of `app\models\Appraisalcalendar`.
 */
class AppraisalcalendarSearch extends Appraisalcalendar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'yearstart', 'yearend', 'mid_year_start', 'mid_year_end', 'end_year_start', 'end_year_end', 'updated_by', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['calendar_year_description'], 'safe'],
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
        $query = Appraisalcalendar::find();

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
            'yearstart' => $this->yearstart,
            'yearend' => $this->yearend,
            'mid_year_start' => $this->mid_year_start,
            'mid_year_end' => $this->mid_year_end,
            'end_year_start' => $this->end_year_start,
            'end_year_end' => $this->end_year_end,
            'updated_by' => $this->updated_by,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'calendar_year_description', $this->calendar_year_description]);

        return $dataProvider;
    }
}
