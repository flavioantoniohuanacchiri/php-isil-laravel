<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Business;
=======
use App\Helpers\ViewHelper;
use App\User;
use App\Profile;
use App\Business;
use DB;
>>>>>>> 82e69a7a881dc7ad357b70d5b61cee69dbfe4b35

class BusinessController extends Controller
{
	public function index(Request $request)
	{
<<<<<<< HEAD
		if ($request->ajax()) {
			return datatables()->of(
	            Business::get()
	        )->toJson();
		}
		return view("business");
=======
		$site = [
			"name" => "Empresas",
			"url_controller" => "business",
			"url" => "business",
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Business::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("business", compact("site"));
>>>>>>> 82e69a7a881dc7ad357b70d5b61cee69dbfe4b35
		
	}
	public function store(Request $request)
	{
<<<<<<< HEAD
		
	}
	public function show(Request $request)
	{
		
=======
		$userId = $request->has("masterId")? $request->masterId : null;
		if ($request->document_number == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Documento"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($userId)) {
				$objTmp = User::where("document_number", $request->document_number)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Usuario con Tu Documento"]);
				}
				$obj = new User;
			} else {
				$objTmp = User::where("document_number", $request->document_number)->where("id", "<>", $userId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Usuario con Tu Documento"]);
				}
				$obj = User::find($userId);
			}
			$obj->name = $request->full_name." ".$request->full_name;
			$obj->full_name = $request->full_name;
			$obj->last_name = $request->last_name;
			$obj->email = $request->email;
			$obj->user_name = $request->user_name;
			$obj->document_number = $request->document_number;
			$obj->profile_id = $request->profile_id;

			if ($request->password !="") {
				$obj->password = \Hash::make($request->password);
			}
			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Usuario Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		$keyCache = "showBusiness";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return Business::find($masterId);
					}
				);
			}
			return response(["rst" => 1, "obj" => $obj]);
			//return response(["rst" => 1, "obj" => User::with("business", "businessTwo")->find($request->masterId)]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
>>>>>>> 82e69a7a881dc7ad357b70d5b61cee69dbfe4b35
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
<<<<<<< HEAD
		
=======
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = User::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Usuario Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
>>>>>>> 82e69a7a881dc7ad357b70d5b61cee69dbfe4b35
	}
}