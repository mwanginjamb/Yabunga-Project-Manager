<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "appraisalcalendar".
 *
 * @property int $id
 * @property int $yearstart
 * @property int $yearend
 * @property string $calendar_year_description
 * @property int|null $mid_year_start
 * @property int|null $mid_year_end
 * @property int|null $end_year_start
 * @property int|null $end_year_end
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Departmentgoal[] $departmentgoals
 * @property Initializedappraisals[] $initializedappraisals
 */
class Appraisalcalendar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appraisalcalendar';
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
            [['yearstart', 'yearend', 'calendar_year_description'], 'required'],
            [['updated_by', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['yearstart', 'yearend', 'mid_year_start', 'mid_year_end', 'end_year_start', 'end_year_end'],'safe'],
            [['calendar_year_description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'yearstart' => 'Year Start',
            'yearend' => 'Year End',
            'calendar_year_description' => 'Calendar Year Description',
            'mid_year_start' => 'Mid Year Start',
            'mid_year_end' => 'Mid Year End',
            'end_year_start' => 'End Year Start',
            'end_year_end' => 'End Year End',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Departmentgoals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentgoals()
    {
        return $this->hasMany(Departmentgoal::className(), ['calendarid' => 'id']);
    }

    /**
     * Gets query for [[Initializedappraisals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInitializedappraisals()
    {
        return $this->hasMany(Initializedappraisals::className(), ['appraisalcalendarid' => 'id']);
    }
}
