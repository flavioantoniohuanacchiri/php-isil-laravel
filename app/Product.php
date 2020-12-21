<?php namespace App;

class Product extends BaseModel
{
	protected $table = "product";

	public function category()
	{
		return $this->hasOne("App\Category", "id", "category_id");
	}
	public function productHasAttribute()
	{
		return $this->belongsTo("App\ProductHasAttribute", "product_id", "id");
	}
}
