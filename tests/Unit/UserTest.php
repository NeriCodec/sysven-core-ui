<?php

namespace Tests\Unit;

use App;
use App\src\Common\Entities\UserEntity;
use App\src\Data\UserRepository;
use App\src\Service\UserUseCase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Prueba para generar una venta
     *
     * @return void
     */
    public function test_para_generar_una_venta()
    {
        $useUseCase = new UserUseCase(new UserRepository());

        $user = factory(App\User::class)->make();

        $userEntity = new UserEntity(
            $user->name,
            $user->password,
            $user->created_at
        );

        $success = $useUseCase->registerUser($userEntity);

        $this->assertTrue($success, true);
    }
}
