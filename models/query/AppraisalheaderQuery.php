<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Appraisalheader]].
 *
 * @see \app\models\Appraisalheader
 */
class AppraisalheaderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Appraisalheader[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Appraisalheader|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
