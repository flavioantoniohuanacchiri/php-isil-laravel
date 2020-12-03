<?php

use App\Coin;
Route::get("test-coin", function() {
	try {
		$obj = new Coin;
		$obj->name = "SOL";
		$obj->code = "PEN";
		$obj->symbol = "S";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Rublo ruso";
		$obj->code = "RUB";
		$obj->symbol = "₽";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();


		$obj = new Coin;
		$obj->name = "Euro";
		$obj->code = "EUR";
		$obj->symbol = "€";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();


		$obj = new Coin;
		$obj->name = "Real brasileño";
		$obj->code = "BRL";
		$obj->symbol = "R$";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();


		$obj = new Coin;
		$obj->name = "Lek albanés";
		$obj->code = "ALL";
		$obj->symbol = "L";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();


		$obj = new Coin;
		$obj->name = "Libra británica";
		$obj->code = "GBP";
		$obj->symbol = "£";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "SOL";
		$obj->code = "PEN";
		$obj->symbol = "S";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Dólar del Caribe Oriental";
		$obj->code = "XCD";
		$obj->symbol = "$";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Peso";
		$obj->code = "ARS";
		$obj->symbol = "$";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Dólar australiano";
		$obj->code = "AUD";
		$obj->symbol = "$";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Dólar bahameño";
		$obj->code = "BSD";
		$obj->symbol = "$";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Rublo bielorruso";
		$obj->code = "BYR";
		$obj->symbol = "Br";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Boliviano";
		$obj->code = "BOB";
		$obj->symbol = "Bs";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Lev búlgaro";
		$obj->code = "BGN";
		$obj->symbol = "лв";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Rublo bielorruso";
		$obj->code = "BYR";
		$obj->symbol = "Br";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Rublo bielorruso";
		$obj->code = "BYR";
		$obj->symbol = "Br";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Escudo caboverdiano";
		$obj->code = "CVE";
		$obj->symbol = "$";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Peso colombiano";
		$obj->code = "COP";
		$obj->symbol = "$";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Franco comorano";
		$obj->code = "KMF";
		$obj->symbol = "Fr";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();

		$obj = new Coin;
		$obj->name = "Peso cubano convertible";
		$obj->code = "CUC";
		$obj->symbol = "$";
		$obj->change_type = "1.0";
		$obj->status = 1;
		$obj->save();
		echo "Exito";


	} catch (Exception $e) {
		echo $e->getMessage();
	}
});