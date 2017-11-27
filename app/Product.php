<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function productInputs()
    {
        return $this->hasMany(ProductCreate::class);
    }

}