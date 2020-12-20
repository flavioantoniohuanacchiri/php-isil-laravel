<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atributo extends Model
{
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];
    protected $fillable = ['codigo', 'nombre', 'estado'];
    protected $table = "atributo";

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
