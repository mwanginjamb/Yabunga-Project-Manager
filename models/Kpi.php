<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "kpi".
 *
 * @property int $id
 * @property int $objectiveid
 * @property string $kpi
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $weight_on_objective
 * @property string|null $achievement
 * @property int|null $mid_year_status
 * @property string|null $appraisee_mid_year_performance_comment
 * @property string|null $supervisor_mid_year_performance_comment
 * @property int|null $self_rating
 * @property int|null $agreed_rating
 * @property string|null $appraisee_end_year_performance_comment
 * @property string|null $supervisor_end_year_performance_comment
 * @property float|null $weighted_score
 *
 * @property Objective $objective
 */
class Kpi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kpi';
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
            [['objectiveid', 'kpi', 'weight_on_objective'], 'required'],
            ['kpi','unique'],
            [['objectiveid', 'updated_by', 'created_by', 'created_at', 'updated_at', 'weight_on_objective', 'mid_year_status', 'self_rating', 'agreed_rating'], 'integer'],
            [['kpi', 'achievement', 'appraisee_mid_year_performance_comment', 'supervisor_mid_year_performance_comment', 'appraisee_end_year_performance_comment', 'supervisor_end_year_performance_comment'], 'string'],
            [['weighted_score'], 'number'],
            [['objectiveid'], 'exist', 'skipOnError' => true, 'targetClass' => Objective::className(), 'targetAttribute' => ['objectiveid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'objectiveid' => 'Objectiveid',
            'kpi' => 'Kpi',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'weight_on_objective' => 'Weight On Objective',
            'achievement' => 'Achievement',
            'mid_year_status' => 'Mid Year Status',
            'appraisee_mid_year_performance_comment' => 'Appraisee Mid Year Performance Comment',
            'supervisor_mid_year_performance_comment' => 'Supervisor Mid Year Performance Comment',
            'self_rating' => 'Self Rating',
            'agreed_rating' => 'Agreed Rating',
            'appraisee_end_year_performance_comment' => 'Appraisee End Year Performance Comment',
            'supervisor_end_year_performance_comment' => 'Supervisor End Year Performance Comment',
            'weighted_score' => 'Weighted Score',
        ];
    }

    /**
     * Gets query for [[Objective]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ObjectiveQuery
     */
    public function getObjective()
    {
        return $this->hasOne(Objective::className(), ['id' => 'objectiveid']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\KpiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\KpiQuery(get_called_class());
    }
}
