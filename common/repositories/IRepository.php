<?php
namespace common\repositories;

use yii\db\ActiveRecord;

class IRepository
{
    /**
     * @param ActiveRecord $record
     * @param array $condition
     */
    protected function getBy(ActiveRecord $record,array $condition)
    {
        $obj = $record::find()->where($condition)->one();
        return $obj;
    }

    protected function getAllBy(ActiveRecord $record, array $cond)
    {
        return $record::findAll($record, $cond);
    }

}
?>
