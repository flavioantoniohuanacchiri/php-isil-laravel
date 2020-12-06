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