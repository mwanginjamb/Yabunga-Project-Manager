<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bid".
 *
 * @property int $id
 * @property int|null $job_id
 * @property float $bid_price
 * @property int|null $startdate
 * @property int|null $enddate
 * @property int|null $max_no_of_bids
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $createdBy
 * @property Job $job
 * @property User $updatedBy
 * @property Bidder[] $bidders
 */
class Bid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_id', 'startdate', 'enddate', 'max_no_of_bids', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['bid_price'], 'required'],
            [['bid_price'], 'number'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'bid_price' => 'Bid Price',
            'startdate' => 'Startdate',
            'enddate' => 'Enddate',
            'max_no_of_bids' => 'Max No Of Bids',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Job]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\JobQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['id' => 'job_id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * Gets query for [[Bidders]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\BidderQuery
     */
    public function getBidders()
    {
        return $this->hasMany(Bidder::className(), ['bid_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\BidQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\BidQuery(get_called_class());
    }
}
