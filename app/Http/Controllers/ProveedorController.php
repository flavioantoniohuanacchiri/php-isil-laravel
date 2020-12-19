<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Proveedor;
use App\Events\UserCreated;
use DB;

class ProveedorController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Proveedores",
			"url_controller" => "proveedor",
			"url" => "proveedor",

		];
		if ($request->ajax()) {
			return datatables()->of(
	            Proveedor::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("proveedor", compact("site"));
		
	}
	public function store(Request $request)
	{
		$userId = $request->has("masterId")? $request->masterId : null;
		if ($request->document_number == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Documento"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($userId)) {
				$objTmp = Proveedor::where("document_number", $request->document_number)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Proveedor con Tu Documento"]);
				}
				$obj = new Proveedor;
			} else {
				$objTmp = Proveedor::where("document_number", $request->document_number)->where("id", "<>", $userId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Proveedor con Tu Documento"]);
				}
				$obj = Proveedor::find($userId);
			}
			
			$obj->nombre = $request->nombre;
			$obj->apellido = $request->apellido;
			$obj->document_number = $request->document_number;
			$obj->email = $request->email;
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
		
		$keyCache = "showProveedor";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return Proveedor::find($masterId);
					}
				);
			}
			return response(["rst" => 1, "obj" => $obj]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);

	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Proveedor::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Proveedor Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}