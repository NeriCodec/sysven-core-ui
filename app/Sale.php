<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * Obtiene todas las ventas de un usuario.
     */

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
