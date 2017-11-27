<?php

namespace App\Http\Controllers;

use App\src\Data\SaleRepository;
use App\src\Service\SaleUseCase;

class SaleController extends Controller
{
    private $saleUseCase;

    public function __construct()
    {
        $this->saleUseCase = new SaleUseCase(new SaleRepository());
    }

    public function showSales()
    {
        return view('sale.sales');
    }
}
