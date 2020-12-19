<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Atributo;
use App\Producto;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Events\UserCreated;
use DB;

class ProductoAtributoController extends Controller
{
    public function index(Request $request)
    {
        $site = [
			"name" => "Atributos y Productos",
			"url_controller" => "productoatributo",
            "url" => "productoatributo",
			"producto" => Producto::where("estado", '1')->get()->toArray(),
			"atributo" => Atributo::where("estado", '1')->get()->toArray(),
		];
		if ($request->ajax()) {
			 return datatables()->of(
	            ProductoAtributo::with([
	            	"producto" => function($q) {
						$q->select("id", "nombre");
					},
					"atributo" => function($q) {
						$q->select("id", "nombre");
	            	},
	        	])->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
			
		}
		
		return view("productoatributo", compact("site"));
    }

    public function store(Request $request)
    {
        $ProductoId = $request->has("masterId")? $request->masterId : null;
		if ($request->valor == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Valor"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($ProductoId)) {
				
				$obj = new ProductoAtributo;
			} else {
				
				$obj = ProductoAtributo::find($ProductoId);
            }
            
			$obj->producto_id = $request->producto_id;
			$obj->atributo_id = $request->atributo_id;
			$obj->valor = $request->valor;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "ProductoAtributo Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
    }

    public function show(Request $request)
    {
        $keyCache = "showProducto";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return ProductoAtributo::find($masterId);
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
		$obj = ProductoAtributo::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "ProductoAtributo Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
    }

}
