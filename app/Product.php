<?php namespace App;

class Product extends BaseModel
{
	protected $table = "product";

	public function category()
    {
        return $this->belongsTo("App\Category");
    }

    public function attribute()
    {
        return $this->belongsTo("App\Attribute");
    }    

}
