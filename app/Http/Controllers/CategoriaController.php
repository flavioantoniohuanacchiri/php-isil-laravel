<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Categoria;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Events\UserCreated;
use DB;


class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $site = [
			"name" => "Categorias",
			"url_controller" => "categoria",
			"url" => "categoria",
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Categoria::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("categoria", compact("site"));
    }

    public function store(Request $request)
    {
        $categoriaId = $request->has("masterId")? $request->masterId : null;
		if ($request->nombre == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Nombre"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($categoriaId)) {
				$objTmp = Categoria::where("nombre", $request->nombre)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una categoría con el mismo nombre"]);
				}
				$obj = new Categoria;
			} else {
				$objTmp = Categoria::where("nombre", $request->nombre)->where("id", "<>", $categoriaId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una categoría con el mismo nombre"]);
				}
				$obj = Categoria::find($categoriaId);
			}
			
			$obj->nombre = $request->nombre;
			$obj->estado = $request->estado;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Categoría Creada"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
    }

    public function show(Request $request)
    {
        $keyCache = "showCategoria";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return Categoria::find($masterId);
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
		$obj = Categoria::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "CategorÍa Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
    }
}
