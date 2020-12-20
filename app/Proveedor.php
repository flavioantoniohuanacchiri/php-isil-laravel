<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Proveedor extends Model
{
    use Notifiable;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];
    protected $fillable = ['empresa', 'contacto', 'document_number','email','status'];
    protected $table = "proveedor";
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("d/m/Y h:i:s a");
    }
}
