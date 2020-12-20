<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Product;
use DB;

class ProductController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Productos",
			"url_controller" => "product",
			"url" => "product",
			"category" => Category::where("status", 1)->get()->toArray(),
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Product::with([
	            	"category" => function($q) {
	            		$q->select("id", "name");
	            		//$q->where("status", 0);
	            	}
	        	])->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("product", compact("site"));
		
	}
	public function store(Request $request)
	{
		$userId = $request->has("masterId")? $request->masterId : null;
		if ($request->code == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Código"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($userId)) {
				$objTmp = Product::where("code", $request->code)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Producto con ese código"]);
				}
				$obj = new Product;
			} else {
				$objTmp = Product::where("code", $request->code)->where("id", "<>", $userId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Producto con ese código"]);
				}
				$obj = Product::find($userId);
			}

			$obj->code = $request->code;
			$obj->name = $request->name;
			$obj->status = $request->status;
			$obj->category_id = $request->category_id;

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
		$keyCache = "showProduct";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return Product::find($masterId);
					}
				);
			}

			return response(["rst" => 1, "obj" => $obj::with(["category"])->find($request->masterId)]);

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
		$obj = Product::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Producto Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}