<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
	use Notifiable;
    use SoftDeletes;
 
	protected $table = "profile";

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code','name', 'status'
	];
	/**public function modules()
	{
		return $this->hasMany("App\ProfileModule", "profile_id", "id");
	}
	*/
	
}



