<?php

use App\Coin;
Route::get("test-coin", function() {
	try {
		$obj = new Coin;
		$obj->name = "Kwacha";
		$obj->code = "MWK";
		$obj->symbol = "MK";
		$obj->save();
  
		echo "Registro Ingresado";
	} catch (Exception $e) {
		echo $e->getMessage();
	}
});