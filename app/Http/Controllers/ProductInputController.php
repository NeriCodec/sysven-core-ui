<?php

namespace App\Http\Controllers;

use App\src\Common\Entities\ProductInputEntity;
use App\src\Data\ProductInputRepository;
use App\src\Service\ProductInputUseCase;
use Illuminate\Http\Request;

class ProductInputController extends Controller
{
    private $productInputUseCase;

    public function __construct()
    {
        $this->productInputUseCase = new ProductInputUseCase(new ProductInputRepository());
    }

    public function showProductInputs()
    {
        $productInputs = $this->productInputUseCase->getAllProductInputs();

        return view('product-input.product-inputs')->with('product_inputs', $productInputs);
    }

    public function registerProductInput(Request $request)
    {
        $productInput = new ProductInputEntity(
            $request->name,
            $request->measure
        );

        $success = $this->productInputUseCase->registerProductInput($productInput);

        if ($success) {
            $this->alert('Insumo de producto registrado con exito', 'success');
        }
        else {
            $this->alert('Error al registrar el insumo de producto', 'danger');
        }

        return redirect()->route('product-inputs');
    }

    public function updateProductInput(Request $request)
    {
        $product = new ProductInputEntity(
            $request->name,
            $request->measure
        );

        $success = $this->productInputUseCase->updateProductInput($product, $request->id);

        if ($success) {
            $this->alert('Insumo de producto actualizado con exito', 'success');
        }
        else {
            $this->alert('Error al actualizado el insumo de producto', 'danger');
        }

        return redirect()->route('product-inputs');
    }

    public function deleteProductInput(Request $request)
    {
        $success = $this->productInputUseCase->deleteProductInput($request->id);

        if ($success) {
            $this->alert('Insumo de producto eliminado con exito', 'success');
        }
        else {
            $this->alert('Error al eliminar el insumo de producto', 'danger');
        }

        return redirect()->route('product-inputs');
    }
}
