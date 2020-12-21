<?php namespace App;

class Attribute extends BaseModel
{
	protected $table = "attribute";

	public function attribute_type()
    {
        return $this->belongsTo("App\AttributeType");
    }

}
