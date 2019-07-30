<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "user_rating_film".
 *
 * @property int $film_id
 * @property int $user_id
 * @property int $rating_id
 *
 * @property Film $film
 * @property UserRating $rating
 * @property User $user
 */
class UserRatingFilm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_rating_film';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'user_id', 'rating_id'], 'required'],
            [['film_id', 'user_id', 'rating_id'], 'integer'],
            [['film_id', 'user_id'], 'unique', 'targetAttribute' => ['film_id', 'user_id']],
            [['film_id', 'user_id', 'rating_id'], 'unique', 'targetAttribute' => ['film_id', 'user_id', 'rating_id']],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'id']],
            [['rating_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRating::className(), 'targetAttribute' => ['rating_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'film_id' => 'Film ID',
            'user_id' => 'User ID',
            'rating_id' => 'Rating ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRating()
    {
        return $this->hasOne(UserRating::className(), ['id' => 'rating_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
