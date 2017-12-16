<?php

namespace App\Http\Controllers;

use App\Sale;
use App\src\Common\Entities\SaleDetailEntity;
use App\src\Data\ProductRepository;
use App\src\Data\SaleDetailRepository;
use App\src\Data\SaleRepository;
use App\src\Service\ProductUseCase;
use App\src\Service\SaleDetailUseCase;
use App\src\Service\SaleUseCase;
use Illuminate\Http\Request;

class SaleDetailController
    extends Controller
{
    private $saleUseCase;
    private $productUseCase;
    private $saleDetailUseCase;

    public function __construct()
    {
        $this->saleUseCase       = new SaleUseCase(new SaleRepository());
        $this->productUseCase    = new ProductUseCase(new ProductRepository());
        $this->saleDetailUseCase = new SaleDetailUseCase(new SaleDetailRepository());
    }

    public function show()
    {
        $sale        = Sale::all();
        $saleDetails = $this->saleDetailUseCase->getSaleDetailsById($sale->last()->id);
        return view('sale-detail.process')->with('saleDetails', $saleDetails);
    }

    public function register(Request $request)
    {
        $CONTAINS_PRODUCT = 1;
        $quantityDefault  = 1;

        $sale             = Sale::all();
        $product          = $this->productUseCase->getProductByName($request->productName);

        if (count($product) != $CONTAINS_PRODUCT) {
            $this->alert('No existe el producto agregado.', 'warning');
            return redirect()->route('sale-detail');
        }

        $saleDetail = new SaleDetailEntity(
            null,
            $sale->last()->id,
            $product->id,
            $quantityDefault,
            $product->price
        );

        $success = $this->saleDetailUseCase->add($saleDetail);

        if ($success) {
            $this->alert('Producto agregado', 'success');
        }
        else {
            $this->alert('Error al agregar', 'danger');
        }

        return redirect()->route('sale-detail');

    }

    public function delete(Request $request)
    {
        $success = $this->saleDetailUseCase->delete($request->id);

        if ($success) {
            $this->alert('Producto eliminado', 'success');
        }
        else {
            $this->alert('Error al eliminar', 'danger');
        }

        return redirect()->route('sale-detail');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->productUseCase->search($request->productName));
        }
    }

}
