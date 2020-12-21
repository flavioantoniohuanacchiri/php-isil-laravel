<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Sale;
use App\SaleDetail;
use App\Customer;
use App\Product;
use DB;

class SaleController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Venta",
			"url_controller" => "sale",
			"url" => "sale",
			"customer" => Customer::where("status", 1)->get()->toArray(),
			"product" => Product::where("status", 1)->get()->toArray()
			
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Sale::with("customer")->get()
	            /*Sale::with([
	            	"customer" => function($q) {
	            		$q->select("id", "name");
	            		//$q->where("status", 0);
	            	}
	        	])->get()*/
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::sale()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("sale", compact("site"));
		
	}
	public function store(Request $request)
	{
		$saleId = $request->has("masterId")? $request->masterId : null;
		if ($request->customer_id == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Cliente"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($saleId)) {
				$obj = new Sale;
			} else {
				$obj = Sale::find($saleId);
			}

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Venta Realizada"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => Sale::find($request->masterId)]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Sale::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Venta Eliminada Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}