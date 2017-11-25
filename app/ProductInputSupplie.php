<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInputSupplie extends Model
{
    protected $table = 'products_inputs_supplies';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
