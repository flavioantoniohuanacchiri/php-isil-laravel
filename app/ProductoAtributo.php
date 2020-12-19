<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoAtributo extends Model
{
    protected $fillable = ['valor'];
    protected $table = "producto_atributos";

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("d/m/Y h:i:s a");
    }

    public function producto()
    {
        return $this->belongsTo("App\Producto");
    }

    public function atributo()
    {
        return $this->belongsTo("App\Atributo");
    }

    public function productoTwo()
    {
        return $this->hasOne("App\Producto", "id", "producto_id");
    }

    public function atributoTwo()
    {
        return $this->hasOne("App\Atributo", "id", "atributo_id");
    }
}
