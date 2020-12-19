<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    protected $fillable = ['codigo', 'nombre', 'estado'];
    protected $table = "atributos";

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("d/m/Y h:i:s a");
    }

    public function atributotipo()
    {
        return $this->belongsTo("App\AtributoTipo");
    }

    public function atributotipoTwo()
    {
        return $this->hasOne("App\AtributoTipo", "id", "atributotipo_id");
    }

}
