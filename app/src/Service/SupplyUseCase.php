<?php

namespace App\src\Service;

use App\src\Common\Entities\SupplyEntity;
use App\src\Common\Interfaces\ISupplyRepository;

class SupplyUseCase
    implements ISupplyRepository
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
    public function create(SupplyEntity $supplyEntity)
    {
        return $this->supplieRepository->create($supplyEntity);
    }

    /**
     * updateSupplie function.
     * @param $supplyEntity
     * @param $id
     */
    public function update(SupplyEntity $supplyEntity, $id)
    {
        return $this->supplieRepository->update($supplyEntity, $id);
    }

    /**
     * deleteSupplie function.
     * @param $id
     */
    public function delete($id)
    {
        return $this->supplieRepository->delete($id);
    }

    /**
     * getAllSupplies function.
     * @return array
     */
    public function getAll()
    {
        return $this->supplieRepository->getAll();
    }


}