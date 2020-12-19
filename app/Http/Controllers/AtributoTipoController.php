<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\AtributoTipo;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Events\UserCreated;
use DB;

class AtributoTipoController extends Controller
{
    public function index(Request $request)
    {
        $site = [
			"name" => "Tipos de atributos",
			"url_controller" => "atributotipo",
			"url" => "atributotipo",
		];
		if ($request->ajax()) {
			return datatables()->of(
	            AtributoTipo::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("AtributoTipo", compact("site"));
    }

    public function store(Request $request)
    {
        $AtributoTipoId = $request->has("masterId")? $request->masterId : null;
		if ($request->nombre == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Nombre"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($AtributoTipoId)) {
				$objTmp = AtributoTipo::where("nombre", $request->nombre)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Tipo con el mismo nombre"]);
				}
				$obj = new AtributoTipo;
			} else {
				$objTmp = AtributoTipo::where("nombre", $request->nombre)->where("id", "<>", $AtributoTipoId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Tipo con el mismo nombre"]);
				}
				$obj = AtributoTipo::find($AtributoTipoId);
            }
            
			$obj->codigo = $request->codigo;
			$obj->nombre = $request->nombre;
			$obj->estado = $request->estado;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Tipo de Atributo Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
    }

    public function show(Request $request)
    {
        $keyCache = "showAtributoTipo";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return AtributoTipo::find($masterId);
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
		$obj = AtributoTipo::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Tipo de Atributo Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
    }

}
