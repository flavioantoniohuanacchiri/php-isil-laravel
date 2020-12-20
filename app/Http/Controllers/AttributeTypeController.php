<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\AttributeType;
use DB;

class AttributeTypeController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Tipos atributo",
			"url_controller" => "attributetype",
			"url" => "attributetype",
		];
		if ($request->ajax()) {
			return datatables()->of(
	            AttributeType::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("attributetype", compact("site"));
		
	}
	public function store(Request $request)
	{
		$userId = $request->has("masterId")? $request->masterId : null;
		if ($request->code == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Codigo"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($userId)) {
				$objTmp = AttributeType::where("code", $request->code)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Tipo atributo con ese código"]);
				}
				$obj = new AttributeType;
			} else {
				$objTmp = AttributeType::where("code", $request->code)->where("id", "<>", $userId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Tipo atributo con ese código"]);
				}
				$obj = AttributeType::find($userId);
			}

			$obj->code = $request->code;
			$obj->name = $request->name;
			$obj->status = $request->status;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Tipo Atributo Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		$keyCache = "showAttributeType";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return AttributeType::find($masterId);
					}
				);
			}
			return response(["rst" => 1, "obj" => $obj]);
			//return response(["rst" => 1, "obj" => User::with("business", "businessTwo")->find($request->masterId)]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = AttributeType::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Tipo atributo Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}