<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Sale;
use App\Client;
use DB;

class SaleController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Ventas",
			"url_controller" => "sale",
			"url" => "sale",
			"client" => Client::where("status", 1)->get()->toArray(),
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Sale::with([
	            	"client" => function($q) {
	            		$q->select("id", "full_name");
	            		//$q->where("status", 0);
	            	}
	        	])->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("sale", compact("site"));
		
	}
	public function store(Request $request)
	{
		$userId = $request->has("masterId")? $request->masterId : null;
		if ($request->id_client == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Cliente"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($userId)) {
				$objTmp = Sale::where("id_client", $request->id_client)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una venta con ese cliente"]);
				}
				$obj = new Sale;
			} else {
				$objTmp = Sale::where("id_client", $request->id_client)->where("id", "<>", $userId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una venta con ese cliente"]);
				}
				$obj = Sale::find($userId);
			}

			$obj->id_client = $request->id_client;
			$obj->fcompra = $request->fcompra;
			$obj->total = $request->total;
			
			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Venta Creada"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		$keyCache = "showSale";
		if (!is_null($request->masterId)) {
			$keyCache.="_".$request->masterId;
			$masterId = $request->masterId;
			$obj = \Cache::get($keyCache);
			if (!$obj) {
				$obj = \Cache::remember(
					$keyCache,
					1*60*60,
					function() use ($masterId) {
						return Sale::find($masterId);
					}
				);
			}

			return response(["rst" => 1, "obj" => $obj::with(["client"])->find($request->masterId)]);

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
		$obj = Sale::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Venta Eliminada Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}