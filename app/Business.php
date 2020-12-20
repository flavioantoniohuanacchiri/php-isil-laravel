<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{

	use Notifiable;
	use SoftDeletes;
	
	protected $table = "business";

	protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

	protected $fillable = [
        'name','number_identifer', 'address','ubigeo','status'
	];
}


