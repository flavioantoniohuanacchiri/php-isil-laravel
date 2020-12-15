<?php namespace App;

class Profile extends BaseModel
{
	protected $table = "profile";

	public function modules()
	{
		return $this->hasMany("App\ProfileModule", "profile_id", "id");
	}
}
