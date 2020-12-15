<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\User;
use App\Profile;
use App\Business;
use App\Module;
use DB;

class ModuleController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Modulos",
			"url_controller" => "module",
			"url" => "module"
		];
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
		$moduleId = $request->has("masterId")? $request->masterId : null;
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($moduleId)) {
				$obj = new Module;
			} else {
				$obj = Module::find($moduleId);
			}
			$obj->name = $request->name;
			$obj->class_icon = $request->class_icon;
			$obj->status = $request->status;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Modulo Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
		print_r($request->all()); dd();
	}
	public function show(Request $request)
	{
		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => Module::find($request->masterId)]);
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