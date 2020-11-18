<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Objective]].
 *
 * @see \app\models\Objective
 */
class ObjectiveQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Objective[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Objective|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
