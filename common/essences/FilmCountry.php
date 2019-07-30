<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "filmcountry".
 *
 * @property int $Film_id
 * @property int $Country_id
 *
 * @property Film $film
 * @property Country $country
 */
class FilmCountry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filmcountry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Film_id', 'Country_id'], 'required'],
            [['Film_id', 'Country_id'], 'integer'],
            [['Film_id', 'Country_id'], 'unique', 'targetAttribute' => ['Film_id', 'Country_id']],
            [['Film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['Film_id' => 'id']],
            [['Country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['Country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Film_id' => 'Film ID',
            'Country_id' => 'Country ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['id' => 'Film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'Country_id']);
    }
}
