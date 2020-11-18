<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "departmentgoal".
 *
 * @property int $id
 * @property string $departmentgoal
 * @property int $departmentid
 * @property int|null $organization_goal_id
 * @property int $calendarid
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Appraisalcalendar $calendar
 * @property Department $department
 * @property Organizationalgoal $organizationGoal
 * @property Objective[] $objectives
 */
class Departmentgoal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departmentgoal';
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
            [['departmentgoal', 'departmentid', 'calendarid','organization_goal_id'], 'required'],
            [['departmentgoal'], 'string'],
            [['departmentid', 'organization_goal_id', 'calendarid', 'updated_by', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['calendarid'], 'exist', 'skipOnError' => true, 'targetClass' => Appraisalcalendar::className(), 'targetAttribute' => ['calendarid' => 'id']],
            [['departmentid'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['departmentid' => 'id']],
            [['organization_goal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizationalgoal::className(), 'targetAttribute' => ['organization_goal_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'departmentgoal' => 'Department Goal',
            'departmentid' => 'Department ID',
            'organization_goal_id' => 'Organization Goal ID',
            'calendarid' => 'Appraisal Calendar ID',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Calendar]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AppraisalcalendarQuery
     */
    public function getCalendar()
    {
        return $this->hasOne(Appraisalcalendar::className(), ['id' => 'calendarid']);
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\DepartmentQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'departmentid']);
    }


    /**
     * Gets query for [[OrganizationGoal]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\OrganizationalgoalQuery
     */
    public function getOrganizationGoal()
    {
        return $this->hasOne(Organizationalgoal::className(), ['id' => 'organization_goal_id']);
    }

    /**
     * Gets query for [[Objectives]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ObjectiveQuery
     */
    public function getObjectives()
    {
        return $this->hasMany(Objective::class, ['departmentgoalid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\DepartmentgoalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\DepartmentgoalQuery(get_called_class());
    }
}
