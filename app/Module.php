<?php namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends BaseModel
{
	use SoftDeletes;
	
	protected $table = "module";

	protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("Y-m-d h:i:s a");
    }

    protected $softDelete = true;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

}

