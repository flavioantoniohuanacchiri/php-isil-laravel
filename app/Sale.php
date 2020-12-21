<?php namespace App;

class Sale extends BaseModel
{
	protected $table = "sale";

    public function customer()
    {
        return $this->belongsTo("App\Customer");
    }
    public function product()
    {
        return $this->belongsTo("App\Product");
    }    
}
