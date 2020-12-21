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
			"name" => "Tipos de Atributos",
			"url_controller" => "attribute_type",
			"url" => "attribute_type"
		];
		if ($request->ajax()) {
			return datatables()->of(
	            AttributeType::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->attribute_type, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("attribute_type", compact("site"));
		
	}
	public function store(Request $request)
	{
		$attribute_typeId = $request->has("masterId")? $request->masterId : null;
		if ($request->name == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita ingresar un Atributo"]);
		}
		if ($request->status == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita seleccionar un estado"]);
		}
		
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($attribute_typeId)) {
				$objTmp = AttributeType::where("name", $request->name)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Atributo con ese Nombre"]);
				}
				$obj = new AttributeType;
			} else {
				$objTmp = AttributeType::where("name", $request->name)->where("id", "<>", $attribute_typeId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Atributo con ese Nombre"]);
				}
				$obj = AttributeType::find($attribute_typeId);
			}
			$obj->name = $request->name;
			$obj->status = $request->status;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Perfil Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => AttributeType::find($request->masterId)]);
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
			return response(["rst" => 1, "msj" => "Atributo Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}