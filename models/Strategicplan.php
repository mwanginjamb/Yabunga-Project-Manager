<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "strategicplan".
 *
 * @property int $id
 * @property int $start_year
 * @property int $end_year
 * @property string $strategicplan_description
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Organizationalgoal[] $organizationalgoals
 */
class Strategicplan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'strategicplan';
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
            [['start_year', 'end_year', 'strategicplan_description'], 'required'],
            [['updated_by', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['start_year', 'end_year'],'safe'],
            [['strategicplan_description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_year' => 'Start Year',
            'end_year' => 'End Year',
            'strategicplan_description' => 'Strategicplan Description',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Organizationalgoals]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\OrganizationalgoalQuery
     */
    public function getOrganizationalgoals()
    {
        return $this->hasMany(Organizationalgoal::className(), ['strategicplanid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\StrategicplanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\StrategicplanQuery(get_called_class());
    }
}
