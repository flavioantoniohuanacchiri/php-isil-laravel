<?php namespace App;

class Attribute extends BaseModel
{
	protected $table = "attribute";

	public function attributeType()
	{
		return $this->hasOne("App\AttributeType", "id", "attribute_type_id");
	}
}
