<?php

namespace common\repositories;

use Codeception\Lib\Driver\Iron;
use common\essences\User;

class UserRepository extends IRepository
{
    private $record;

    public function __construct(User $user)
    {
        $this->record = $user;
    }

    public function getUserById($id)
{
    return User::findOne(['id'=>$id]);
}

    public function getNormalTime($timestamp)
    {
        return date('l, d F, Y \a\t H:i:s', $timestamp);
}


}