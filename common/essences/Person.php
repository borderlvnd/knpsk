<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "Person".
 *
 * @property int $id
 * @property string $FullName
 * @property int $function
 * @property int $country_id
 * @property Awardperson[] $awardpeople
 * @property Award[] $awards
 * @property Comment[] $comments
 * @property Film[] $films
 * @property Filmperson[] $filmpeople
 * @property Film[] $films0
 * @property Country $country
 * @property string $birthDate
 * @property string $photo
 */
class Person extends \yii\db\ActiveRecord
{
    public const ROLE_PRODUCER = 11;
    public const ROLE_ACTOR = 10;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['function', 'country_id'], 'integer'],
            [['birthDate'], 'safe'],
            [['FullName'], 'string', 'max' => 255],
            [['photo'], 'string', 'max' => 100],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            ];
    }
    //TODO: comments,
    // similar films, genreIndexviewWithAllFilms, userProfile
    //


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FullName' => 'Full Name',
            'function' => 'Function',
            'country_id' => 'Country ID',
            'birthDate' => 'Birth Date',
            'photo' => 'Photo',
        ];
    }
    public function getAwardpeople()
    {
        return $this->hasMany(Awardperson::className(), ['Person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAwards()
    {
        return $this->hasMany(Award::className(), ['id' => 'Award_id'])->viaTable('awardperson', ['Person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['producer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmpeople()
    {
        return $this->hasMany(Filmperson::className(), ['Person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms0()
    {
        return $this->hasMany(Film::className(), ['id' => 'Film_id'])->viaTable('filmperson', ['Person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
}

