<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Attribute;
use App\AttributeType;
use DB;

class AttributeController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Atributos",
			"url_controller" => "attribute",
			"url" => "attribute",
			"attributetype" => AttributeType::where("status", 1)->get()->toArray(),
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Attribute::with([
	            	"attributetype" => function($q) {
	            		$q->select("id", "name");
	            		//$q->where("status", 0);
	            	}
	        	])->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("attribute", compact("site"));
		
	}
	public function store(Request $request)
	{
		$userId = $request->has("masterId")? $request->masterId : null;
		if ($request->code == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Código"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($userId)) {
				$objTmp = Attribute::where("code", $request->code)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Atributo con ese código"]);
				}
				$obj = new Attribute;
			} else {
				$objTmp = Attribute::where("code", $request->code)->where("id", "<>", $userId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Atributo con ese código"]);
				}
				$obj = Attribute::find($userId);
			}

			$obj->code = $request->code;
			$obj->name = $request->name;
			$obj->status = $request->status;
			$obj->attribute_type_id = $request->attribute_type_id;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Atributo Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		$keyCache = "showAttribute";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return Attribute::find($masterId);
					}
				);
			}

			return response(["rst" => 1, "obj" => $obj::with(["attributetype"])->find($request->masterId)]);

			//return response(["rst" => 1, "obj" => $obj]);

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
		$obj = Attribute::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Atributo Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}