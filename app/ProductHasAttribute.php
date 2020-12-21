<?php namespace App;

class ProductHasAttribute extends BaseModel
{
	protected $table = "product_has_attribute";

	public function product()
	{
		return $this->hasOne("App\Product", "id", "product_id");
	}
	public function attribute()
	{
		return $this->hasOne("App\Attribute", "id", "attribute_id");
	}
}
