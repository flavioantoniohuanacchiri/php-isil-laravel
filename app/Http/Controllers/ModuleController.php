<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\User;
use App\Profile;
use App\Module;
use App\Events\UserCreated;
use DB;

class ModuleController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Modulos",
			"url_controller" => "module",
			"url" => "module",
			//"profile" => Profile::where("status", 1)->get()->toArray(),
			//"business" => Business::where("status", 1)->get()->toArray()
		];
		/*if ($request->ajax()) {
			return datatables()->of(
	            Module::with([
	            	"profile" => function($q) {
	            		$q->select("id", "name");
	            		//$q->where("status", 0);
	            	}
	        	])->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}*/

		if ($request->ajax()) {
			return datatables()->of(
	            Module::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("module", compact("site"));
				
	}
	public function store(Request $request)
	{
		$userId = $request->has("masterId")? $request->masterId : null;
		/*if ($request->document_number == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Documento"]);
		}*/
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($userId)) {
				$objTmp = Module::where("name", $request->name)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Modulo con ese nombre"]);
				}
				$obj = new Module;
			} else {
				$objTmp = Module::where("name", $request->name)->where("id", "<>", $userId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Modulo con ese nombre"]);
				}
				$obj = Module::find($userId);
			}
			$obj->name = $request->name;
			$obj->class_icon = $request->class_icon;
			$obj->order = $request->order;
			$obj->status = $request->status;
			//$obj->profile_id = $request->profile_id;

			$obj->save();
			DB::commit();
			if (is_null($userId)) {
				event(new ModuleCreated($obj));
			}
			return response(["rst" => 1, "obj" => $obj, "msj" => "Modulo Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		$business = $obj->business;

		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => User::with(["business", "businessTwo"])->find($request->masterId)]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Module::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Modulo Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}