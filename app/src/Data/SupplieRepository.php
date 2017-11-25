<?php

namespace App\src\Data;


use App\Provaider;
use App\src\Common\Entities\SupplieEntity;
use App\src\Common\Interfaces\ISupplieRepository;
use App\Supplie;

class SupplieRepository implements ISupplieRepository
{
    public function registerSupplie(SupplieEntity $supplieEntity)
    {
        $supplie = new Supplie;

        $supplie->name = $supplieEntity->getName();
        $supplie->address = $supplieEntity->getAddress();

        return $supplie->save();
    }
}