<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Departmentgoal;

/**
 * DepartmentgoalSearch represents the model behind the search form of `app\models\Departmentgoal`.
 */
class DepartmentgoalSearch extends Departmentgoal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'departmentid', 'organization_goal_id', 'calendarid', 'updated_by', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['departmentgoal'], 'safe'],
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
        $query = Departmentgoal::find();

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
            'departmentid' => $this->departmentid,
            'organization_goal_id' => $this->organization_goal_id,
            'calendarid' => $this->calendarid,
            'updated_by' => $this->updated_by,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'departmentgoal', $this->departmentgoal]);

        return $dataProvider;
    }
}
