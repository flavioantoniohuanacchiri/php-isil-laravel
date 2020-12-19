<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public $table = 'venta';

    protected $fillable = [ 'nombre_cliente', 'email_cliente', 'total'];

    public function producto()
    {
        return $this->belongsToMany(Producto::class)->withPivot(['quantity']);
    }
}
