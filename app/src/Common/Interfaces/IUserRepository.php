<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\UserEntity;

interface IUserRepository
{
    public function registerUser(UserEntity $userEntity);
}