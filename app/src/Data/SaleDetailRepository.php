<?php

namespace App\src\Data;

use App\Product;
use App\Sale;
use App\SaleDetail;
use App\src\Common\Entities\SaleDetailEntity;
use App\src\Common\Interfaces\ISaleDetailRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class SaleDetailRepository
    implements ISaleDetailRepository
{
    public function create(SaleDetailEntity $saleDetailEntity)
    {
        try {
            $saleDetail = new SaleDetail;

            $saleDetail->sales_id    = $saleDetailEntity->getSalesId();
            $saleDetail->products_id = $saleDetailEntity->getProductsId();
            $saleDetail->quantity    = $saleDetailEntity->getQuantity();
            $saleDetail->subtotal    = $saleDetailEntity->getSubtotal();

            $response = $saleDetail->save();
        } catch (QueryException $error) {
            $response = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $response;
    }

    public function getAll()
    {
        try {
            $sale        = new Sale;
            $saleDetails = $sale->saleDetails()->get();
        } catch (QueryException $error) {
            $saleDetails = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $saleDetails;
    }

    public function update(SaleDetailEntity $saleDetailEntity, $id)
    {
        try {
            $saleDetail = SaleDetail::find($id);
            $product = Product::find($saleDetailEntity->getProductsId());

            $saleDetail->sales_id    = $saleDetailEntity->getSalesId();
            $saleDetail->products_id = $saleDetailEntity->getProductsId();
            $saleDetail->quantity    = $saleDetail->quantity + 1;
            $saleDetail->subtotal    = $product->price * $saleDetail->quantity;

            $response = $saleDetail->save();
        } catch (QueryException $error) {
            $response = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $response;
    }

    public function getSaleDetailById($id)
    {
        try {
            $saleDetail = SaleDetail::all()->where('products_id', '=', $id)->last();
        } catch (QueryException $error) {
            $saleDetail = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $saleDetail->id;
    }


    public function getSaleDetailsById($id)
    {
        $saleDetailsSerialize = [];

        try {
            $saleDetails = DB::table('sales_details')
                             ->join('sales', 'sales_details.sales_id', '=', 'sales.id')
                             ->join('products', 'products.id', '=', 'sales_details.products_id')
                             ->select('products.id', 'products.name', 'sales_details.id as salesDetailsId', 'products.price', 'sales.created_at', 'sales_details.quantity', 'sales_details.subtotal')
                             ->where('sales.id', '=', $id)
                             ->get()
                             ->jsonSerialize();


            foreach ($saleDetails as $saleDetail) {
                array_unshift($saleDetailsSerialize, $saleDetail);
            }

        } catch (QueryException $error) {
            $saleDetailsSerialize = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $saleDetailsSerialize;
    }
}