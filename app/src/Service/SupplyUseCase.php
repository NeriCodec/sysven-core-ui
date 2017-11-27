<?php

namespace App\src\Service;

use App\src\Common\Entities\SupplyEntity;
use App\src\Common\Interfaces\ISupplyRepository;

class SupplyUseCase implements ISupplyRepository
{
    private $supplieRepository;

    /**
     * SupplyUseCase constructor.
     * @param $supplieRepository
     */
    public function __construct(ISupplyRepository $supplieRepository)
    {
        $this->supplieRepository = $supplieRepository;
    }

    /**
     * registerSupplie function.
     * @param $supplyEntity
     */
    public function registerSupply(SupplyEntity $supplyEntity)
    {
        return $this->supplieRepository->registerSupply($supplyEntity);
    }

    /**
     * updateSupplie function.
     * @param $supplyEntity
     * @param $id
     */
    public function updateSupply(SupplyEntity $supplyEntity, $id)
    {
        return $this->supplieRepository->updateSupply($supplyEntity, $id);
    }

    /**
     * deleteSupplie function.
     * @param $id
     */
    public function deleteSupply($id)
    {
        return $this->supplieRepository->deleteSupply($id);
    }

    /**
     * getAllSupplies function.
     * @return array
     */
    public function getAllSupplies()
    {
        return $this->supplieRepository->getAllSupplies();
    }


}