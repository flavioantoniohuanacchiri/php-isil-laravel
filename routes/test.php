<?php

use App\Business;
Route::get("test-business", function() {
	try {
		$obj = new Business;
		$obj->number_identifer = "10724465120";
		$obj->name = "Lucia Andrea Quinto Ascurra";
		$obj->save();

		echo "Exito";
	} catch (Exception $e) {
		echo $e->getMessage();
	}
});

use App\Coin;
Route::get("test-coin", function() {
	try {
		$obj = new Coin;
		$obj->name= "Tengue kazajo";
		$obj->code = "KZT";
		$obj->symbol = "₸";
		$obj->change_type = "2.80";
		$obj->status = "1";
		$obj->save();

		echo "Exito";
	} catch (Exception $e) {
		echo $e->getMessage();
	}
});