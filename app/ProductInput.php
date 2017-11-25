<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInput extends Model
{
    protected $table = 'product_inputs';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
