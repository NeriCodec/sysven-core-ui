<?php

namespace App\src\Service;


use App\src\Common\Entities\UserEntity;
use App\src\Common\Interfaces\IUserRepository;

class UserUseCase implements IUserRepository
{
    private $userRepository;

    /**
     * UserUseCase constructor.
     * @param $userRepository
     */
    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function registerUser(UserEntity $userEntity)
    {
        return $this->userRepository->registerUser($userEntity);
    }
}