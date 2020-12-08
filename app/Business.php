<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
	protected $table = "business";
	
	protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("Y-m-d h:i:s a");
    }
}
