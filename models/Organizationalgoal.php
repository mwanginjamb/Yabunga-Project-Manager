<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "organizationalgoal".
 *
 * @property int $id
 * @property string $goal
 * @property int|null $strategicplanid
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Departmentgoal[] $departmentgoals
 * @property Strategicplan $strategicplan
 */
class Organizationalgoal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizationalgoal';
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
            [['goal','strategicplanid'], 'required'],
            [['goal'], 'string'],
            [['strategicplanid', 'updated_by', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['strategicplanid'], 'exist', 'skipOnError' => true, 'targetClass' => Strategicplan::className(), 'targetAttribute' => ['strategicplanid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goal' => 'Organizational Goal Description',
            'strategicplanid' => 'Strategic Plan ID',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Departmentgoals]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\DepartmentgoalQuery
     */
    public function getDepartmentgoals()
    {
        return $this->hasMany(Departmentgoal::className(), ['organization_goal_id' => 'id']);
    }

    /**
     * Gets query for [[Strategicplan]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\StrategicplanQuery
     */
    public function getStrategicplan()
    {
        return $this->hasOne(Strategicplan::className(), ['id' => 'strategicplanid']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\OrganizationalgoalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\OrganizationalgoalQuery(get_called_class());
    }
}
