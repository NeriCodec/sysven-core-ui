<?php

namespace App\src\Data;


use App\src\Common\Entities\UserEntity;
use App\src\Common\Interfaces\IUserRepository;
use App\User;

class UserRepository implements IUserRepository
{
    public function registerUser(UserEntity $userEntity)
    {
        $user = new User;

        $user->user = $userEntity->getUser();
        $user->password = $userEntity->getPassword();
        $user->created_at = $userEntity->getCreatedAt();

        return $user->save();
    }
}