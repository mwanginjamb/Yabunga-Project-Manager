<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appraisal_status".
 *
 * @property int $id
 * @property string $status
 *
 * @property Initializedappraisals[] $initializedappraisals
 * @property Initializedappraisals[] $initializedappraisals0
 */
class AppraisalStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appraisal_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'unique'],
            [['status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Initializedappraisals]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\InitializedappraisalsQuery
     */
    public function getInitializedappraisals()
    {
        return $this->hasMany(Initializedappraisals::className(), ['ey_status_id' => 'id']);
    }

    /**
     * Gets query for [[Initializedappraisals0]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\InitializedappraisalsQuery
     */
    public function getInitializedappraisals0()
    {
        return $this->hasMany(Initializedappraisals::className(), ['my_status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\AppraisalStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AppraisalStatusQuery(get_called_class());
    }
}
