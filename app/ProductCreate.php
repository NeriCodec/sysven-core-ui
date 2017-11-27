<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCreate extends Model
{
    protected $table = 'product_inputs_use';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
