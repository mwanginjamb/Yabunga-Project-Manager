<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Bid]].
 *
 * @see \app\models\Bid
 */
class BidQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Bid[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Bid|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
