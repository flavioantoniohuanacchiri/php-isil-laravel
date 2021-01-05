<?php namespace App\Handlers\Repository;

use App\Handlers\Interfaces\BusinessInterface;
use App\Business;
use DB;

class BusinessRepository implements BusinessInterface
{
	public function create($business = []) {
		DB::beginTransaction();
		try {
			$obj = new Business;
			$obj->name = $business["name"];
			$obj->address = $business["address"];
			$obj->ubigeo = $business["ubigeo"];
			$obj->number_identifer = $business["number_identifer"];

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Empresa Creada"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function update($businessId = null, $business = []) {
		DB::beginTransaction();
		try {
			$obj = Business::find($businessId);
			$obj->name = $business["name"];
			$obj->address = $business["address"];
			$obj->ubigeo = $business["ubigeo"];
			$obj->number_identifer = $business["number_identifer"];

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Empresa Actualizada"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
}