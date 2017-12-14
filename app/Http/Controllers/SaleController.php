<?php

namespace App\Http\Controllers;

use App\src\Common\Entities\SaleEntity;
use App\src\Data\ProductRepository;
use App\src\Data\SaleRepository;
use App\src\Service\ProductUseCase;
use App\src\Service\SaleUseCase;
use App\User;
use Illuminate\Http\Request;

class SaleController
    extends Controller
{
    private $saleUseCase;

    public function __construct()
    {
        $this->saleUseCase    = new SaleUseCase(new SaleRepository());
    }

    public function show()
    {
        return view('sale.sales');
    }

    public function register()
    {
        $sale = new SaleEntity(
            0,
            date('Y-m-d H:m:s'),
            1
        );

        $this->saleUseCase->generateSale($sale);

        return redirect()->route('sale-detail');
    }

}
