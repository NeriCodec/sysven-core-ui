<?php

namespace App\Http\Controllers;

use App\src\Common\Entities\ProductEntity;
use App\src\Data\ProductInputSupplyRepository;
use App\src\Data\ProductRepository;
use App\src\Service\ProductInputSupplyUseCase;
use App\src\Service\ProductUseCase;
use Illuminate\Http\Request;

class ProductController
    extends Controller
{
    private $productUseCase;
    private $productInputSupplyUseCase;

    public function __construct()
    {
        $this->productUseCase            = new ProductUseCase(new ProductRepository());
        $this->productInputSupplyUseCase = new ProductInputSupplyUseCase(new ProductInputSupplyRepository());
    }

    public function show()
    {
        $productsWithInput     = $this->productUseCase->getAllProductsWithInputs();
        $productsInputSupplies = $this->productInputSupplyUseCase->getAll();


        return view('product.products')->with('products', $productsWithInput)
                                       ->with('productInputs', $productsInputSupplies);
    }

    public function register(Request $request)
    {

        $product = new ProductEntity(
            null,
            $request->name,
            $request->price,
            $request->inputs
        );

        $success = $this->productUseCase->create($product);

        if ($success) {
            $this->alert('Producto registrado con exito', 'success');
        }
        else {
            $this->alert('Error al registrar el producto', 'danger');
        }

        return redirect()->route('products');
    }

    public function update(Request $request)
    {
        $product = new ProductEntity(
            $request->id,
            $request->name,
            $request->price,
            $request->inputs
        );

        $success = $this->productUseCase->update($product);

        if ($success) {
            $this->alert('Producto actualizado con exito', 'success');
        }
        else {
            $this->alert('Error al actualizado el producto', 'danger');
        }

        return redirect()->route('products');
    }

    public function delete(Request $request)
    {
        $success = $this->productUseCase->delete($request->id);

        if ($success) {
            $this->alert('Producto eliminado con exito', 'success');
        }
        else {
            $this->alert('Error al eliminar el producto', 'danger');
        }

        return redirect()->route('products');
    }
}
