<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Atributo;
use App\AtributoTipo;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Events\UserCreated;
use DB;

class AtributoController extends Controller
{
    public function index(Request $request)
    {
        $site = [
			"name" => "Atributos",
			"url_controller" => "atributo",
            "url" => "atributo",
            "atributotipo" => AtributoTipo::where("estado", '1')->get()->toArray(),
		];
		if ($request->ajax()) {
			 return datatables()->of(
	            Atributo::with([
	            	"atributotipo" => function($q) {
						$q->select("id", "nombre");
	            	},
	        	])->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
			
		}
		
		return view("atributo", compact("site"));
    }

    public function store(Request $request)
    {
        $AtributoId = $request->has("masterId")? $request->masterId : null;
		if ($request->nombre == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Nombre"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($AtributoId)) {
				$objTmp = Atributo::where("nombre", $request->nombre)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Atributo con el mismo nombre"]);
				}
				$obj = new Atributo;
			} else {
				$objTmp = Atributo::where("nombre", $request->nombre)->where("id", "<>", $AtributoId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Atributo con el mismo nombre"]);
				}
				$obj = Atributo::find($AtributoId);
            }
            
			$obj->codigo = $request->codigo;
			$obj->nombre = $request->nombre;
			$obj->estado = $request->estado;
			$obj->atributotipo_id = $request->atributotipo_id;

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
        $keyCache = "showAtributo";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return Atributo::find($masterId);
					}
				);
			}
			return response(["rst" => 1, "obj" => $obj]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
    }

    public function destroy(Request $request)
    {
        $masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Atributo::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Atributo Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
    }

}
