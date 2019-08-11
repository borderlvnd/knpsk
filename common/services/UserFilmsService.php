<?php

namespace common\services;

use common\essences\User;
use common\essences\UserFilms;
use common\repositories\UserRepository;
use Yii;

class UserFilmsService
{
    public $userRepository;

    public function __construct(User $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function addToFavorites($film_id, $user_id)
    {
        $uf = new UserFilms();
        $uf->film_id = $film_id;
        $uf->user_id = $user_id;

        if(!$uf->save()) {
            Yii::$app->session->setFlash('danger','Already in favorites');
        }
        else {
            Yii::$app->session->setFlash('success','Added to favorites');
        }

    }
}