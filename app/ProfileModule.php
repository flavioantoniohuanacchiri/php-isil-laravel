<?php namespace App;

class ProfileModule extends BaseModel
{
	protected $table = "profile_module";

	public function profileModules()
	{
		return $this->hasMany("App\ProfileModule", "id", "module_id");
	}
}
