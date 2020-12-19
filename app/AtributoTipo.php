<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtributoTipo extends Model
{
    protected $fillable = ['codigo', 'nombre', 'estado'];
    protected $table = "atributo_tipos";

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("d/m/Y h:i:s a");
    }
}
