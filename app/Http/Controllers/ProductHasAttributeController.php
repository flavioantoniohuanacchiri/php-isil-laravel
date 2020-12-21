<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\ProductHasAttribute;
use App\Product;
use App\Attribute;
use DB;

class ProductHasAttributeController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Producto - Atributos",
			"url_controller" => "producthasattribute",
			"url" => "producthasattribute",
			"product" => Product::where("status", 1)->get()->toArray(),
			"attribute" => Attribute::where("status", 1)->get()->toArray()
		];
		if ($request->ajax()) {
			return datatables()->of(
	            ProductHasAttribute::with([
	            	"product" => function($q) {
	            		$q->select("id", "name");
	            		//$q->where("status", 0);
	            	},
	            	"attribute" => function($q) {
	            		$q->select("id", "name");
	            		//$q->where("status", 0);
	            	},
	        	])->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("producthasattribute", compact("site"));
		
	}
	public function store(Request $request)
	{
		$userId = $request->has("masterId")? $request->masterId : null;

		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($userId)) {
				$objTmp = ProductHasAttribute::where("product_id", $request->product_id)->where("attribute_id", $request->attribute_id)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Producto - Attributo igual"]);
				}
				$obj = new ProductHasAttribute;
			} else {
				$objTmp = ProductHasAttribute::where("product_id", $request->product_id)->where("attribute_id", $request->attribute_id)->where("id", "<>", $userId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Producto - Attributo igual"]);
				}
				$obj = ProductHasAttribute::find($userId);
			}

			$obj->product_id = $request->product_id;
			$obj->attribute_id = $request->attribute_id;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Producto - Atributos Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		$keyCache = "showProductHasAttribute";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return ProductHasAttribute::find($masterId);
					}
				);
			}

			return response(["rst" => 1, "obj" => $obj::with(["product","attribute"])->find($request->masterId)]);

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
		$obj = ProductHasAttribute::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Producto - Atributo Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}