<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre', 'estado'];
    protected $table = "categoria";

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("d/m/Y h:i:s a");
    }
}
