<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Product;
use App\Provider;
use App\ProviderHasProduct;
use DB;

class ProviderHasProductController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "ProveedorTieneProductos",
			"url_controller" => "providerhasproduct",
			"url" => "providerhasproduct",
			"provider" => Provider::where("status", 1)->get()->toArray(),
			"product" => Product::where("status", 1)->get()->toArray(),
		];
		if ($request->ajax()) {
			return datatables()->of(
	            ProviderHasProduct::with([
	            	"provider" => function($q) {
	            		$q->select("id", "name");
	            		//$q->where("status", 0);
	            	},
	            	"product" => function($q) {
	            		$q->select("id", "name");
	            		//$q->where("number_identifer", "like", "%35%");
	            	}
	        	])->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("providerhasproduct", compact("site"));
		
	}
	public function store(Request $request)
	{
		$userId = $request->has("masterId")? $request->masterId : null;
		if ($request->id_provider == "" && $request->id_product == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Proveedor que Tiene Producto"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($userId)) {
				$objTmp = ProviderHasProduct::where(["id_provider", $request->id_provider], ["id_product", $request->id_product])->first();
				//$objTmp1 = ProviderHasProduct::where("id_product", $request->id_product)->first();
				//if (!is_null($objTmp) && !is_null($objTmp1)) {
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Proveedor que Tiene Producto"]);
				}
				$obj = new ProviderHasProduct;
			} else {
				$objTmp = ProviderHasProduct::where(["id_provider", $request->id_provider], ["id_product", $request->id_product])->where("id", "<>", $userId)->first();
				//$objTmp1 = ProviderHasProduct::where("id_product", $request->id_product)->where("id", "<>", $userId)->first();
				//if (!is_null($objTmp) && !is_null($objTmp1)) {
				if (!is_null($objTmp) ) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Proveedor que Tiene Producto"]);
				}
				$obj = ProviderHasProduct::find($userId);
			}

			$obj->id_provider  = $request->id_provider;
			$obj->id_product  = $request->id_product ;
			
			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Proveedor que Tiene Producto Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		$keyCache = "showProviderHasProduct";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return ProviderHasProduct::find($masterId);
					}
				);
			}

			return response(["rst" => 1, "obj" => $obj::with(["provider"],["product"])->find($request->masterId)]);

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
		$obj = ProviderHasProduct::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Proveedor que Tiene Producto Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}