<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "initializedappraisals".
 *
 * @property int $id
 * @property int $appraisalcalendarid
 * @property int $departmentid
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string $employee_no
 * @property int|null $objective_setting_status_id
 * @property int|null $my_status_id
 * @property int|null $ey_status_id
 * @property string|null $supervisor_no
 *
 * @property Appraisalcalendar $appraisalcalendar
 * @property Department $department
 * @property AppraisalStatus $eyStatus
 * @property AppraisalStatus $myStatus
 * @property ObjectiveSettingStatus $objectiveSettingStatus
 * @property Employee $supervisorNo
 */
class Initializedappraisals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'initializedappraisals';
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
            [['appraisalcalendarid', 'departmentid'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appraisalcalendarid' => 'Appraisal Calendar',
            'departmentid' => 'Department',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',

        ];
    }

    /**
     * Gets query for [[Appraisalcalendar]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AppraisalcalendarQuery
     */
    public function getAppraisalcalendar()
    {
        return $this->hasOne(Appraisalcalendar::className(), ['id' => 'appraisalcalendarid']);
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
     * Gets query for [[EyStatus]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AppraisalStatusQuery
     */
    public function getEyStatus()
    {
        return $this->hasOne(AppraisalStatus::className(), ['id' => 'ey_status_id']);
    }

    /**
     * Gets query for [[MyStatus]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\AppraisalStatusQuery
     */
    public function getMyStatus()
    {
        return $this->hasOne(AppraisalStatus::className(), ['id' => 'my_status_id']);
    }

    /**
     * Gets query for [[ObjectiveSettingStatus]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ObjectiveSettingStatusQuery
     */
    public function getObjectiveSettingStatus()
    {
        return $this->hasOne(ObjectiveSettingStatus::className(), ['id' => 'objective_setting_status_id']);
    }

    /**
     * Gets query for [[SupervisorNo]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\EmployeeQuery
     */
    public function getSupervisorNo()
    {
        return $this->hasOne(Employee::className(), ['employee_no' => 'supervisor_no']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\InitializedappraisalsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\InitializedappraisalsQuery(get_called_class());
    }

    public function afterSave($insert, $changedAttributes)
    {
        if($insert)
        {

            $Employees = Employee::find()->where(['departmentid' => $this->departmentid])->all();

            //Yii::$app->recruitment->printrr($Employees);
            $errors = [];
            foreach($Employees as $emp){
                $model = new Appraisalheader();
                // Populate Appraisal Header
                $model->employee_no = $emp->employee_no;
                $model->supervisor_no = $emp->supervisor_id;
                $model->initialization_id = $this->id;
                if(!$model->save()){
                    $errors[] = $model->getErrors();
                }
            }

            if(count($errors)){
                Yii::$app->recruitment->printrr($errors);
            }else{
                Yii::$app->session->setFlash('success','Appraisal Initialized successfully for employees.', true);
            }
        }
    }
}
