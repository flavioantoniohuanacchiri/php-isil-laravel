<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Tipo;
use DB;

class TipoController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Tipo",
			"url_controller" => "tipo",
			"url" => "tipo",
			"tipo" => Tipo::where("status", 1)->get()->toArray() 
			 
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Tipo::get()
	        )->addColumn('action', function ($data){
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("tipo", compact("site"));
		
	}
	public function store(Request $request)
	{
		$tipoId = $request->has("masterId")? $request->masterId : null;
		if ($request->code == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Código de Tipo"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($tipoId)) {
				$objTmp =Tipo::where("code", $request->code)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una Tipo con ese código"]);
				}
				$obj = new Tipo;
			} else {
				$objTmp = Tipo::where("code", $request->code)->where("id", "<>", $tipoId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una tipo con ese código"]);
				}
				$obj = Tipo::find($tipoId);
			}
			$obj->code = $request->code;
            $obj->name = $request->name;			
			$obj->status = $request->status;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Tipo Creada"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Tipo::find($masterId);
		$tipo = $obj->tipo;

		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => $obj, "msj" => ""]);
			/**return response(["rst" => 1, "obj" => User::with("business", "businessTwo")->find($request->masterId)]);*/
			/**return response(["rst" => 1, "obj" => Profile::with("profile", "profile")->find($request->masterId)]);*/
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Tipo::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Tipo Eliminada Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}