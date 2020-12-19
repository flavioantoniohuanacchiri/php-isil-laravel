<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaProducto extends Model
{
    protected $fillable = ['quantity'];
    protected $table = "producto_venta";

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("d/m/Y h:i:s a");
    }

    public function producto()
    {
        return $this->belongsTo("App\Producto");
    }

    public function productoTwo()
    {
        return $this->hasOne("App\Producto", "id", "producto_id");
    }

  
}
