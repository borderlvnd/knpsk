<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $CountryName
 *
 * @property Filmcountry[] $filmcountries
 * @property Film[] $films
 * @property Person[] $people
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CountryName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'CountryName' => 'Country Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmcountries()
    {
        return $this->hasMany(Filmcountry::className(), ['Country_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['id' => 'Film_id'])->viaTable('filmcountry', ['Country_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['country_id' => 'id']);
    }
}
