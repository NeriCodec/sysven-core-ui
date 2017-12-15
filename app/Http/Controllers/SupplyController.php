<?php

namespace App\Http\Controllers;

use App\src\Common\Entities\SupplyEntity;
use App\src\Common\Interfaces\ISupplyRepository;
use App\src\Data\SupplyRepository;
use App\src\Service\SupplyUseCase;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    private $supplyRepository;

    /**
     * SupplyController constructor.
     */
    public function __construct()
    {
        $this->supplyRepository = new SupplyUseCase(new SupplyRepository());
    }

    public function showSupplies()
    {
        $supplies = $this->supplyRepository->getAll();

        return view('supply.supplies')->with('supplies', $supplies);
    }

    public function registerSupply(Request $request)
    {
        $supply = new SupplyEntity(
            $request->name,
            $request->address
        );

        $success = $this->supplyRepository->create($supply);

        if ($success) {
            $this->alert('Proveedor registrado con exito', 'success');
        }
        else {
            $this->alert('Error al registrar proveedor', 'danger');
        }

        return redirect()->route('supplies');
    }

    public function updateSupply(Request $request)
    {
        $supply = new SupplyEntity(
            $request->name,
            $request->address
        );

        $success = $this->supplyRepository->update($supply, $request->id);

        if ($success) {
            $this->alert('Proveedor actualizado con exito', 'success');
        }
        else {
            $this->alert('Error al actualizar proveedor', 'danger');
        }

        return redirect()->route('supplies');
    }

    public function deleteSupply(Request $request)
    {
        $success = $this->supplyRepository->delete($request->id);

        if ($success) {
            $this->alert('Proveedor eliminado con exito', 'success');
        }
        else {
            $this->alert('Error al eliminar el proveedor', 'danger');
        }

        return redirect()->route('supplies');
    }
}
