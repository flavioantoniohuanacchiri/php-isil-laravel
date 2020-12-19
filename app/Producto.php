<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['codigo', 'nombre', 'precio', 'estado'];
    protected $table = "producto";

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("d/m/Y h:i:s a");
    }

    public function categoria()
    {
        return $this->belongsTo("App\Categoria");
    }

    public function proveedor()
    {
        return $this->belongsTo("App\Proveedor");
    }

    public function categoriaTwo()
    {
        return $this->hasOne("App\Categoria", "id", "categoria_id");
    }

    public function proveedorTwo()
    {
        return $this->hasOne("App\Proveedor", "id", "proveedor_id");
    }

    public function venta()
    {
        return $this->belongsToMany(Venta::class);
    }

}
