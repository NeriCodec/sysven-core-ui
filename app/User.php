<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * Obtiene todas las ventas de un usuario.
     */

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }
}
