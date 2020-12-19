<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
<<<<<<< HEAD

=======
>>>>>>> 82e69a7a881dc7ad357b70d5b61cee69dbfe4b35

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $softDelete = true;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("Y-m-d h:i:s a");
    }

    public function business()
    {
        return $this->belongsTo("App\Business");
    }
    public function businessTwo()
    {
        return $this->hasOne("App\Business", "id", "business_id");
    }
<<<<<<< HEAD
=======

    public function profile()
    {
        return $this->belongsTo("App\Profile");
    }
>>>>>>> 82e69a7a881dc7ad357b70d5b61cee69dbfe4b35
}
