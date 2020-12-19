<?php namespace App;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Profile extends Model
{
	protected $table = "profile";

    use SoftDeletes;
    protected $softDelete = true;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
=======
class Profile extends BaseModel
{
	protected $table = "profile";

	public function modules()
	{
		return $this->hasMany("App\ProfileModule", "profile_id", "id");
	}
>>>>>>> 82e69a7a881dc7ad357b70d5b61cee69dbfe4b35
}
