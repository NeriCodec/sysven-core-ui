<?php

namespace App\src\Common\Interfaces;


use App\src\Common\Entities\SupplieEntity;

interface ISupplieRepository
{
    public function registerSupplie(SupplieEntity $supplieEntity);
}