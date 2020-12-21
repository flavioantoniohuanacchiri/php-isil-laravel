<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{

	use Notifiable;
	use SoftDeletes;
	
	protected $table = "cliente";

	protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array 
     */

	protected $fillable = [
        'code','name', 'categ','status'
        ];
        
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("d-m-Y h:i:s a");
    }

    public function ventasP()
    {
        return $this->belongsTo("App\Ventas");
    }

}


