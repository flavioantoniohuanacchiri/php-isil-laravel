<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Categoria;
use App\Proveedor;
use App\Producto;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Events\UserCreated;
use DB;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $site = [
			"name" => "Productos",
			"url_controller" => "producto",
			"url" => "producto",
			"proveedor" => Proveedor::where("status",'1')->get()->toArray(),
			"categoria" => Categoria::where("estado", '1')->get()->toArray(),
			
		];
		if ($request->ajax()) {
			 return datatables()->of(
	            Producto::with([
	            	"categoria" => function($q) {
						$q->select("id", "nombre");
					},
					"proveedor" => function($q) {
						$q->select("id", "empresa");
	            	},
	        	])->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		
		return view("Producto", compact("site"));
    }

    public function store(Request $request)
    {
        $ProductoId = $request->has("masterId")? $request->masterId : null;
		if ($request->nombre == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Nombre"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($ProductoId)) {
				$objTmp = Producto::where("nombre", $request->nombre)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Producto con el mismo nombre"]);
				}
				$obj = new Producto;
			} else {
				$objTmp = Producto::where("nombre", $request->nombre)->where("id", "<>", $ProductoId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Producto con el mismo nombre"]);
				}
				$obj = Producto::find($ProductoId);
            }
            
			$obj->codigo = $request->codigo;
			$obj->nombre = $request->nombre;
			$obj->precio = $request->precio;
			$obj->estado = $request->estado;
			$obj->proveedor_id = $request->proveedor_id;
			$obj->categoria_id = $request->categoria_id;		
						
			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Producto Creado"]);
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
						return Producto::find($masterId);
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
		$obj = Producto::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Producto Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
    }

}
