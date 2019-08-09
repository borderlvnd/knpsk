<?php

namespace common\essences;


use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $verification_token
 * @property string $last_visit
 *
 * @property Comment[] $comments
 * @property Comment[] $comments0
 * @property UserFilms[] $userFilms
 * @property Film[] $films
 * @property UserRatingFilm[] $userRatingFilms
 * @property Film[] $films0
 */
class User extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['last_visit'], 'safe'],
            [
                ['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'],
                'string',
                'max' => 255
            ],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     * @var common\essences\User $user
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'last_visit' => 'Last Visit',
        ];
    }

    public static function lastActivity($event)
    {
        // var_dump(Yii::$app->user->identity->getId()); die();
        if (!Yii::$app->user->isGuest) {
            $user = User::findOne(Yii::$app->user->id);
            $user->updateAttributes(['last_visit'=>time()]);
        }

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments0()
    {
        return $this->hasMany(Comment::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFilms()
    {
        return $this->hasMany(UserFilms::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('user_films', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRatingFilms()
    {
        return $this->hasMany(UserRatingFilm::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms0()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('user_rating_film',
            ['user_id' => 'id']);
    }
}
