<?php

namespace common\services;

use common\repositories\UserRepository;
use common\essences\User;

class UserService
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }




    public function getNormalLastVisitedTime(User $user)
    {
        return $this->userRepository->getNormalTime($user->last_visit);
    }

    public function getCreatedAtTime (User $user)
    {
        return $this->userRepository->getNormalTime($user->created_at);
    }


}
