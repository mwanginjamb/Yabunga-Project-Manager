<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "objective".
 *
 * @property int $id
 * @property int $departmentgoalid
 * @property string $objective
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $weight
 * @property float $weighted_objective_score
 * @property float $employee_no
 * @property float $appraisal_id
 *
 * @property Kpi[] $kpis
 * @property Departmentgoal $departmentgoal
 */
class Objective extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objective';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['departmentgoalid', 'objective', 'weight'], 'required'],
            ['objective','unique'],
            [['departmentgoalid', 'updated_by', 'created_by', 'created_at', 'updated_at', 'weight','appraisal_id'], 'integer'],
            [['objective','employee_no'], 'string'],
            [['weighted_objective_score'], 'number'],
            //[['departmentgoalid'], 'exist', 'skipOnError' => true, 'targetClass' => Departmentgoal::className(), 'targetAttribute' => ['departmentgoalid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'departmentgoalid' => 'Department Goal',
            'objective' => 'Objective',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'weight' => 'Weight',
            'weighted_objective_score' => 'Weighted Objective Score',
        ];
    }

    /**
     * Gets query for [[Kpis]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\KpiQuery
     */
    public function getKpis()
    {
        return $this->hasMany(Kpi::className(), ['objectiveid' => 'id']);
    }

    /**
     * Gets query for [[Departmentgoal]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\DepartmentgoalQuery
     */
    public function getDepartmentgoal()
    {
        return $this->hasOne(Departmentgoal::className(), ['id' => 'departmentgoalid']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\ObjectiveQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ObjectiveQuery(get_called_class());
    }
}
