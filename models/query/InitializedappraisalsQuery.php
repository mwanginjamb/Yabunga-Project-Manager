<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Initializedappraisals]].
 *
 * @see \app\models\Initializedappraisals
 */
class InitializedappraisalsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Initializedappraisals[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Initializedappraisals|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
