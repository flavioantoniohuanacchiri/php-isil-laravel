<?php namespace App;

class Sale extends BaseModel
{
	protected $table = "sale";

	public function client()
	{
		return $this->hasMany("App\Client", "id", "id_client");
	}
}
