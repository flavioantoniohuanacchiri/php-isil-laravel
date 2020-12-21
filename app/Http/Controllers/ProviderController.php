<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Provider;
use DB;

class ProviderController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Proveedor",
			"url_controller" => "provider",
			"url" => "provider"
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Provider::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("provider", compact("site"));
		
	}
	public function store(Request $request)
	{
		$providerId = $request->has("masterId")? $request->masterId : null;
		if ($request->document_number == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Documento"]);
		}
		if ($request->name == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Nombre"]);
		}
		if ($request->email == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Correo"]);
		}
		
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($providerId)) {
				$objTmp = Provider::where("document_number", $request->document_number)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Proveedor con ese RUC"]);
				}
				$obj = new Provider;
			} else {
				$objTmp = Provider::where("document_number", $request->document_number)->where("id", "<>", $providerId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Proveedor con ese RUC"]);
				}
				$obj = Provider::find($providerId);
			}
			$obj->name = $request->name;
			$obj->address = $request->address;
			$obj->zip = $request->zip;
			$obj->phone = $request->phone;
			$obj->email = $request->email;
			$obj->document_number = $request->document_number;
			$obj->status = $request->status;
			
			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Proveedor Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => Provider::find($request->masterId)]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Provider::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Proveedor Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}