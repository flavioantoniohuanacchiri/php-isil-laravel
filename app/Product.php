<?php namespace App;

class Product extends BaseModel
{
	protected $table = "product";

	public function category()
	{
		return $this->hasOne("App\Category", "id", "category_id");
	}
}
