<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "awardperson".
 *
 * @property int $Award_id
 * @property int $Person_id
 *
 * @property Award $award
 * @property Person $person
 */
class AwardPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'awardperson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Award_id', 'Person_id'], 'required'],
            [['Award_id', 'Person_id'], 'integer'],
            [['Award_id', 'Person_id'], 'unique', 'targetAttribute' => ['Award_id', 'Person_id']],
            [['Award_id'], 'exist', 'skipOnError' => true, 'targetClass' => Award::className(), 'targetAttribute' => ['Award_id' => 'id']],
            [['Person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['Person_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Award_id' => 'Award ID',
            'Person_id' => 'Person ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAward()
    {
        return $this->hasOne(Award::className(), ['id' => 'Award_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'Person_id']);
    }
}
