<?php

namespace App\Http\Controllers;

use App\src\Common\Entities\ProductEntity;
use App\src\Data\ProductInputRepository;
use App\src\Data\ProductRepository;
use App\src\Service\ProductInputUseCase;
use App\src\Service\ProductUseCase;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productUseCase;
    private $productInputUseCase;

    public function __construct()
    {
        $this->productUseCase      = new ProductUseCase(new ProductRepository());
        $this->productInputUseCase = new ProductInputUseCase(new ProductInputRepository());
    }

    public function showProducts()
    {
        $products      = $this->productUseCase->getAllProducts();
        $productInputs = $this->productInputUseCase->getAllProductInputs();

        return view('product.products')->with('products', $products)
                                       ->with('productInputs', $productInputs);
    }

    public function registerProduct(Request $request)
    {
        $product = new ProductEntity(
            $request->name,
            $request->price
        );

        $success = $this->productUseCase->registerProduct($product, $request->inputs);

        if ($success) {
            $this->alert('Producto registrado con exito', 'success');
        }
        else {
            $this->alert('Error al registrar el producto', 'danger');
        }

        return redirect()->route('products');
    }

    public function updateProduct(Request $request)
    {
        $product = new ProductEntity(
            $request->name,
            $request->price
        );

        $success = $this->productUseCase->updateProduct($product, $request->id);

        if ($success) {
            $this->alert('Producto actualizado con exito', 'success');
        }
        else {
            $this->alert('Error al actualizado el producto', 'danger');
        }

        return redirect()->route('products');
    }

    public function deleteProduct(Request $request)
    {
        $success = $this->productUseCase->deleteProduct($request->id);

        if ($success) {
            $this->alert('Producto eliminado con exito', 'success');
        }
        else {
            $this->alert('Error al eliminar el producto', 'danger');
        }

        return redirect()->route('products');
    }
}