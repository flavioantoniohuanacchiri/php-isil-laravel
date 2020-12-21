<?php namespace App;

class Sale extends BaseModel
{
	protected $table = "sale";

	public function client()
	{
		return $this->hasOne("App\Client", "id", "id_client");
	}
}
