<?php

use App\Business;

Route::get("test-business", function() {
	try {
		$obj = new Business;
		$obj->number_identifer = "10435350378";
		$obj->name = "Fernando Jacobo Quiroz Cabanillas";
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

Route::get("test-user/{userId}", function($userId) {
	$user = \DB::select("CALL showUser(?)", [$userId]);
	echo "<pre>";
	print_r($user);
	echo "</pre>";
});
Route::get("test-user-pdf", "TestController@getPDFUser");