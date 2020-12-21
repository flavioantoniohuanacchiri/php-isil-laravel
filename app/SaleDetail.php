<?php namespace App;

class SaleDetail extends BaseModel
{
	protected $table = "saledetail";

	public function sale()
	{
		return $this->hasOne("App\Sale", "id", "sale_id");
	}
	public function productHasAttribute()
	{
		return $this->hasOne("App\ProductHasAttribute", "id", "product_has_attribute_id");
	}
}
