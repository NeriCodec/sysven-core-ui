<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplie extends Model
{
    protected $table = 'supplies';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
