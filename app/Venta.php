<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public $table = 'ventas';

    protected $fillable = [ 'nombre_cliente', 'email_cliente'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot(['quantity']);
    }
}
