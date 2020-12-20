<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\User;
use App\Profile;
use App\Business;
use DB;

class BusinessController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Business",
			"url_controller" => "business",
			"url" => "business",  
			"business" => Business::where("status", 1)->get()->toArray()
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Business::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("business", compact("site"));
		
	}
	public function store(Request $request)
	{
		
		$businessId = $request->has("masterId")? $request->masterId : null;
		if ($request->number_identifer == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Documento"]);
		}
		 
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($businessId)) {		
			    $obj = new Business;
			}else{
				$obj = Business::find($businessId);
			}
			/**if (is_null($businessId)) {
				$objTmp = Business::where("number_identifer", $request->number_identifer)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Business con Tu Documento"]);
				}
				$obj = new Business;
			} else {
				$objTmp = Business::where("number_identifer", $request->number_identifer)->where("id", "<>", $businessId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Business con Tu Documento"]);
				}
				$obj = Business::find($businessId);
			}*/
			/**return response(["rst" => 1, "obj" => [],'msj' => $request->name]);*/
			/**$obj->id = $request->id;*/
			$obj->name = $request->name;
			$obj->number_identifer = $request->number_identifer;
			$obj->address = $request->address;
			$obj->ubigeo = $request->ubigeo;			
			$obj->status = $request->status;
			

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Business Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Business::find($masterId);
		/**$business = $obj->business;*/

		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => $obj, "msj" => ""]);
			/**return response(["rst" => 1, "obj" => User::with("business", "businessTwo")->find($request->masterId)]);*/
			/**return response(["rst" => 1, "obj" => Profile::with("profile", "profile")->find($request->masterId)]);*/
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);

		 /**$keyCache = "showBusiness";
		 if (!is_null($request->masterId)) {
		 	$keyCache.="_".$request->masterId;
		 	$masterId = $request->masterId;
		 	$obj = \Cache::get($keyCache);
		 	if (!$obj) {
		 		$obj = \Cache::remember(
		 			$keyCache,
		 			1*60*60,
		 			function() use ($masterId) {
		 				return Business::find($masterId);
		 			}
		  		);
			 }*/
		
		 
	
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Business::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Business Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}