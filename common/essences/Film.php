<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "film".
 *
 * @property int $id
 * @property string $FilmName
 * @property string $description
 * @property string $duration
 * @property string $image
 * @property string $Preview
 * @property int $rating_id
 * @property int $producer_id\
 * @property int $user_rating_id
 * @property Person producer
 * @property int releaseYear
 *
 * @property Comment[] $comments
 * @property Mpaa $rating
 * @property Filmcountry[] $filmcountries
 * @property Country[] $countries
 * @property Filmgenre[] $filmgenres
 * @property Genre[] $genres
 * @property Filmperson[] $filmpeople
 * @property Person[] $people
 * @property UserRatingFilm[] $userRatingFilm
 *  @property User[] $users
 * @property UserRating[] $userRatings
 */
class Film extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['rating_id', 'producer_id','releaseYear'], 'integer'],
            [['FilmName', 'image', 'Preview'], 'string', 'max' => 200],
            [['duration'], 'string', 'max' => 10],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['producer_id' => 'id']],
            [['rating_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mpaa::className(), 'targetAttribute' => ['rating_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FilmName' => 'Film Name',
            'description' => 'Description',
            'duration' => 'Duration',
            'image' => 'Image',
            'Preview' => 'Preview',
            'rating_id' => 'Rating',
            'producer_id' => 'Producer',
            'releaseYear' => 'Release Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRating()
    {
        return $this->hasOne(Mpaa::className(), ['id' => 'rating_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducer()
    {
        return $this->hasOne(Person::className(), ['id' => 'producer_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::className(), ['id' => 'Country_id'])->viaTable('filmcountry', ['Film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmgenres()
    {
        return $this->hasMany(Filmgenre::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::className(), ['id' => 'genre_id'])->viaTable('filmgenre', ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmpeople()
    {
        return $this->hasMany(Filmperson::className(), ['Film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['id' => 'Person_id'])->viaTable('filmperson', ['Film_id' => 'id']);
    }

    public function getUserRatingFilms()
    {
        return $this->hasMany(UserRatingFilm::className(), ['film_id' => 'id']);
    }

    public function getuserRatings()
    {
        return $this->hasMany(UserRating::className(),['id'=>'rating_id'])->viaTable('user_rating_film',['film_id'=>'id']);
    }


    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_rating_film', ['film_id' => 'id']);
    }
}
