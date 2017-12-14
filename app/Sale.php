<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class, 'sales_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'products_id', 'id');
    }
}
