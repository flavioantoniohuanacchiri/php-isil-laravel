<?php namespace App;

class Module extends BaseModel
{
	protected $table = "module";

public function modules()
	{
		return $this->BelongTo("App\Module", "id", "module_id");
	}

}
