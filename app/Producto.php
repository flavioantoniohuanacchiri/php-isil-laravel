<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['codigo', 'nombre', 'precio', 'estado'];
    protected $table = "productos";

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("d/m/Y h:i:s a");
    }

    public function categoria()
    {
        return $this->belongsTo("App\Categoria");
    }

    public function categoriaTwo()
    {
        return $this->hasOne("App\Categoria", "id", "categoria_id");
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class);
    }

}
