<?php

namespace App\src\Service;

use App\src\Common\Entities\SupplieEntity;
use App\src\Common\Interfaces\ISupplieRepository;

class SupplieUseCase implements ISupplieRepository
{
    private $supplieRepository;

    /**
     * SupplieUseCase constructor.
     * @param $supplieRepository
     */
    public function __construct(ISupplieRepository $supplieRepository)
    {
        $this->supplieRepository = $supplieRepository;
    }

    /**
     * registerSupplie function.
     * @param $supplieEntity
     */
    public function registerSupplie(SupplieEntity $supplieEntity)
    {
        return $this->supplieRepository->registerSupplie($supplieEntity);
    }
}