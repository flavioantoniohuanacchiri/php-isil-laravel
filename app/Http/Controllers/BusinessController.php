<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Business;
use DB;

class BusinessController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Empresas",
			"url_controller" => "business",
			"url" => "business",
			//"profile" => Profile::where("status", 1)->get()->toArray()
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
		
	}
	public function store(Request $request)
	{
		$businessId = $request->has("masterId")? $request->masterId : null;
		if ($request->number_identifer == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un RUC"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($businessId)) {
				$objTmp = Business::where("number_identifer", $request->number_identifer)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una Empresa con Tu RUC"]);
				}
				$obj = new Business;
			} else {
				$objTmp = Business::where("number_identifer", $request->number_identifer)->where("id", "<>", $businessId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una Empresa con Tu RUC"]);
				}
				$obj = Business::find($businessId);
			}
			$obj->name = $request->name;
			$obj->address = $request->address;
			$obj->ubigeo = $request->ubigeo;
			$obj->number_identifer = $request->number_identifer;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Empresa Creada"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
		print_r($request->all()); dd();
	}
	public function show(Request $request)
	{
		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => Business::find($request->masterId)]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		
	}
}