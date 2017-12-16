<?php

namespace App\Http\Controllers;

use App\src\Common\Entities\ProductInputSupplyEntity;
use App\src\Data\ProductInputSupplyRepository;
use App\src\Data\SupplyRepository;
use App\src\Service\ProductInputSupplyUseCase;
use App\src\Service\SupplyUseCase;
use Illuminate\Http\Request;

class ProductInputSupplieController
    extends Controller
{
    private $supplyUsecase;
    private $productInputSupplieUseCase;

    public function __construct()
    {
        $this->supplyUsecase              = new SupplyUseCase(new SupplyRepository());
        $this->productInputSupplieUseCase = new ProductInputSupplyUseCase(new ProductInputSupplyRepository());
    }

    public function show()
    {
        $productsInputSupplie = $this->productInputSupplieUseCase->getAll();
        $supplies             = $this->supplyUsecase->getAll();

        return view('product-input-supplie.product-input-supplies')
            ->with('productsInputSupplie', $productsInputSupplie)->with('supplies', $supplies);
    }

    public function register(Request $request)
    {
        $quantity_in_input = $request->amount * $request->quantity;

        $productInputSupply = new ProductInputSupplyEntity(
            $request->name,
            $request->amount,
            $request->measure,
            $quantity_in_input,
            $request->supplies_id,
            $quantity_in_input
        );

        $success = $this->productInputSupplieUseCase->create($productInputSupply);

        if ($success) {
            $this->alert('Insumo del proveedor registrado con exito', 'success');
        }
        else {
            $this->alert('Error al registrar el insumo del proveedor', 'danger');
        }

        return redirect()->route('product-input-supplies');
    }
}
