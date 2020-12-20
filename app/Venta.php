<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];
    public $table = 'venta';

    protected $fillable = [ 'nombre_cliente', 'email_cliente', 'total'];

    public function producto()
    {
        return $this->belongsToMany(Producto::class)->withPivot(['quantity']);
    }
}
