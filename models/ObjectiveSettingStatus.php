<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "objective_setting_status".
 *
 * @property int $id
 * @property string $status
 *
 * @property Initializedappraisals[] $initializedappraisals
 */
class ObjectiveSettingStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objective_setting_status';
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
        return $this->hasMany(Initializedappraisals::className(), ['objective_setting_status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\ObjectiveSettingStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ObjectiveSettingStatusQuery(get_called_class());
    }
}
