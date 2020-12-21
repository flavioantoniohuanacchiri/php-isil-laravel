<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\SaleDetail;
use App\Sale;
use App\ProductHasAttribute;
use DB;

class SaleDetailController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Detalle Compra",
			"url_controller" => "saledetail",
			"url" => "saledetail",
			"sale" => Sale::get()->toArray(),
			"producthasattribute" => ProductHasAttribute::with([
										"product" => function($q){
											$q->select("id","name");
										},
										"attribute" => function($q){
											$q->select("id","name");
										}
									])->get()->toArray(),
		];
		if ($request->ajax()) {
			return datatables()->of(
	            SaleDetail::with([
	            	"sale" => function($q) {
	            		$q->select("id", "id");
	            		//$q->where("status", 0);
	            	},
	            	"producthasattribute.product" => function($q) {
	            		$q->select("id","name");
	            		//$q->where("status", 0);
	            	},
	            	"producthasattribute.attribute" => function($q) {
	            		$q->select("id","name");
	            		//$q->where("status", 0);
	            	},
	        	])->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("saledetail", compact("site"));
		
	}
	public function store(Request $request)
	{
		$userId = $request->has("masterId")? $request->masterId : null;

		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($userId)) {
				$obj = new SaleDetail;
			} else {
				$obj = SaleDetail::find($userId);
			}

			$obj->quantity = $request->quantity;
			$obj->unit_price = $request->unit_price;
			$obj->total = $request->quantity * $request->unit_price;
			$obj->sale_id = $request->sale_id;
			$obj->product_has_attribute_id = $request->product_has_attribute_id;

			$obj->save();

			$obj_sale = Sale::where("id",$request->sale_id)->first();
			$obj_saledetail = SaleDetail::where("sale_id",$request->sale_id)->get();

 			$total = 0;

			foreach ($obj_saledetail as $key => $value) {
				$total += $value['total'];
			}

			$obj_sale->total = $total;

			$obj_sale->save();

			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Detalle Compra Creada"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}

		DB::beginTransaction();
		try {
			$obj_sale = Sale::where("id",$request->sale_id)->first();
			$obj_saledetail = SaleDetail::where("sale_id",$request->sale_id)->get();

 			$total = 0;

			/*foreach ($obj_d as $key => $value) {
				$total += $value['total'];
			}*/

			$obj_sale->total = 5;

			$obj_sale->save();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
		}

	}
	public function show(Request $request)
	{
		$keyCache = "showSaleDetail";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return SaleDetail::find($masterId);
					}
				);
			}

			return response(["rst" => 1, "obj" => $obj::with(["sale","producthasattribute"])->find($request->masterId)]);

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
			return response(["rst" => 1, "msj" => "Detalle Compra Eliminada Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}