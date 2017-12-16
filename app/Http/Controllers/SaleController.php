<?php

namespace App\Http\Controllers;

use App\src\Common\Entities\SaleEntity;
use App\src\Data\SaleRepository;
use App\src\Service\SaleUseCase;
use Illuminate\Http\Request;


class SaleController
    extends Controller
{
    private $saleUseCase;

    public function __construct()
    {
        $this->saleUseCase = new SaleUseCase(new SaleRepository());
    }

    public function show()
    {
        $sales = $this->saleUseCase->getAll();
        return view('sale.sales')->with('sales', $sales);
    }

    public function register(Request $request)
    {
        $sale = new SaleEntity(
            $request->subtotal != null ? $request->subtotal : 0,
            date('Y-m-d H:m:s'),
            1
        );

        $success = $this->saleUseCase->generateSale($sale);

        if($request->subtotal == null) {
            // Envia al modulo de detalle de ventas
            return redirect()->route('sale-detail');
        }

        if ($success) {
            $this->alert('Venta realizada con exito', 'success');
        }
        else {
            $this->alert('Error al realizar venta', 'danger');
        }

        return redirect()->route('sales');
    }

}
