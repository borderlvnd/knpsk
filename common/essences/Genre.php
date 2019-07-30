<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string $GenreName
 *
 * @property Filmgenre[] $filmgenres
 * @property Film[] $films
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['GenreName'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'GenreName' => 'Genre Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmgenres()
    {
        return $this->hasMany(Filmgenre::className(), ['genre_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('filmgenre', ['genre_id' => 'id']);
    }
}
