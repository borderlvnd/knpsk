<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "filmperson".
 *
 * @property int $Film_id
 * @property int $Person_id
 *
 * @property Person $person
 * @property Film $film
 */
class FilmPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filmperson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Film_id', 'Person_id'], 'required'],
            [['Film_id', 'Person_id'], 'integer'],
            [['Film_id', 'Person_id'], 'unique', 'targetAttribute' => ['Film_id', 'Person_id']],
            [['Person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['Person_id' => 'id']],
            [['Film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['Film_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Film_id' => 'Film ID',
            'Person_id' => 'Person ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'Person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['id' => 'Film_id']);
    }
}
