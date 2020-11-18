<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "appraisalheader".
 *
 * @property int $id
 * @property string $employee_no
 * @property int|null $objective_setting_status_id
 * @property int|null $ey_status_id
 * @property int|null $my_status_id
 * @property string|null $supervisor_no
 * @property int|null $initialization_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Appraisalheader extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appraisalheader';
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
            [['employee_no'], 'required'],
            [['objective_setting_status_id','my_status_id', 'ey_status_id', 'initialization_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['employee_no', 'supervisor_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_no' => 'Employee No',
            'objective_setting_status_id' => 'Objective Setting Status ID',
            'ey_status_id' => 'End Year Status ID',
            'my_status_id' => 'Mid Year Status ID',
            'supervisor_no' => 'Supervisor No',
            'initialization_id' => 'Initialization ID',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getInitialization()
    {
        return $this->hasOne(Initializedappraisals::className(), ['id' => 'initialization_id']);
    }

    public function getEmployee()
    {
        return Employee::find()->where(['employee_no' => $this->employee_no ])->asArray()->one();
    }

    public function getSupervisor()
    {
        return Employee::find()->select(["CONCAT(firstname,' ',middlename,' ',lastname) as name"])->where(['employee_no' => $this->supervisor_no])->asArray()->one();
    }

    public function getDepartmentalobjectives()
    {
        return Departmentgoal::find()->where(['departmentid' => $this->employee['departmentid']])->all();
    }
    /**
     * {@inheritdoc}
     * @return \app\models\query\AppraisalheaderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AppraisalheaderQuery(get_called_class());
    }
}
