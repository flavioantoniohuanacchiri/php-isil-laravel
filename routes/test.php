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
		$obj->name= "Kip";
		$obj->code = "₭";
		$obj->symbol = "LAK";
		$obj->change_type = "1.80";
		$obj->status = "1";
		$obj->save();

		echo "Exito";
	} catch (Exception $e) {
		echo $e->getMessage();
	}
});

Route::get("set-cache", function() {
	\Cache::put("isil", "isil-2020");
});
Route::get("get-cache", function() {
	echo \Cache::get("isil");
});