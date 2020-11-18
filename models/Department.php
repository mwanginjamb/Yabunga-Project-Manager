<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $department
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Departmentgoal[] $departmentgoals
 * @property Employee[] $employees
 * @property Initializedappraisals[] $initializedappraisals
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
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
            [['department'], 'required'],
            [['department'], 'unique'],
            [['updated_by', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['department'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department' => 'Department',
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
        return $this->hasMany(Departmentgoal::className(), ['departmentid' => 'id']);
    }


    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\EmployeeQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['departmentid' => 'id']);
    }

    /**
     * Gets query for [[Initializedappraisals]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\InitializedappraisalsQuery
     */
    public function getInitializedappraisals()
    {
        return $this->hasMany(Initializedappraisals::className(), ['departmentid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\DepartmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\DepartmentQuery(get_called_class());
    }
}
