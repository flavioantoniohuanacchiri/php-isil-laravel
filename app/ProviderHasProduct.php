<?php namespace App;

class ProviderHasProduct extends BaseModel
{
	protected $table = "provider_has_products";

	public function provider()
	{
		return $this->hasMany("App\Provider", "id", "id_provider");
	}

	public function product()
	{
		return $this->hasMany("App\Product", "id", "id_product");
	}
}