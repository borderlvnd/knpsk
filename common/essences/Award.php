<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "award".
 *
 * @property int $id
 * @property string $AwardName
 *
 * @property Awardperson[] $awardpeople
 * @property Person[] $people
 */
class Award extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'award';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['AwardName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'AwardName' => 'Award Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAwardpeople()
    {
        return $this->hasMany(Awardperson::className(), ['Award_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['id' => 'Person_id'])->viaTable('awardperson', ['Award_id' => 'id']);
    }
}
