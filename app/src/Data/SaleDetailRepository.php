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
    public function add(SaleDetailEntity $saleDetailEntity)
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

    public function incrementQuantityOfProductOfSaleDetail($saleId)
    {
        try {
            $saleDetail = SaleDetail::find($saleId);
            $product    = Product::find($saleDetail->products_id);

            $saleDetail->quantity = $saleDetail->quantity + 1;
            $saleDetail->subtotal = $product->price * $saleDetail->quantity;

            $response = $saleDetail->save();
        } catch (QueryException $error) {
            $response = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $response;
    }

    public function removeQuantityOfProductOfSaleDetail($saleId)
    {
        try {
            $saleDetail = SaleDetail::find($saleId);
            $product    = Product::find($saleDetail->products_id);

            $saleDetail->quantity = $saleDetail->quantity - 1;
            $saleDetail->subtotal = $product->price * $saleDetail->quantity;

            $response = $saleDetail->save();
        } catch (QueryException $error) {
            $response = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $response;
    }


    public function delete($saleId)
    {
        try {
            $saleDetail = SaleDetail::find($saleId);
            $response   = $saleDetail->delete();
        } catch (QueryException $exception) {
            $response = [];
        }

        return $response;
    }


    /**
     * @return int
     */
    public function getIdOfSaleDetailByProductId($productId)
    {
        try {
            $saleDetail = SaleDetail::all()->where('products_id', '=', $productId)->last();
        } catch (QueryException $error) {
            $saleDetail = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $saleDetail->id;
    }

    public function getProductOfSaleDetailById($saleDetailId)
    {
        try {
            $productOfSaleDetail = DB::table('sales_details')
                                       ->join('sales', 'sales_details.sales_id', '=', 'sales.id')
                                       ->join('products', 'products.id', '=', 'sales_details.products_id')
                                       ->select('products.id as productId', 'products.name', 'products.price', 'sales_details.quantity')
                                       ->where('sales_details.id', '=', $saleDetailId)
                                       ->get()
                                       ->last();
        } catch (QueryException $error) {
            $productOfSaleDetail = [];
            //throw new Exception(':: [Error al obtener los productos] :: ' . $error->getMessage());
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $productOfSaleDetail;
    }


    public function getSaleDetailsById($saleId)
    {
        $saleDetailsSerialize = [];

        try {
            $saleDetails = DB::table('sales_details')
                             ->join('sales', 'sales_details.sales_id', '=', 'sales.id')
                             ->join('products', 'products.id', '=', 'sales_details.products_id')
                             ->select('products.id as productId', 'products.name', 'sales_details.id as salesDetailsId', 'products.price', 'sales.created_at', 'sales_details.quantity', 'sales_details.subtotal')
                             ->where('sales.id', '=', $saleId)
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