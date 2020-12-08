<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Profile;
use DB;

class ProfileController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Perfiles",
			"url_controller" => "profile",
			"url" => "profile",
			//"profile" => Profile::where("status", 1)->get()->toArray()
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Profile::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("profile", compact("site"));
		
	}
	public function store(Request $request)
	{
		$profileId = $request->has("masterId")? $request->masterId : null;
		if ($request->name == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Nombre"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($profileId)) {
				$objTmp = Profile::where("name", $request->name)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Perfil con ese Nombre"]);
				}
				$obj = new Profile;
			} else {
				$objTmp = Profile::where("name", $request->name)->where("id", "<>", $profileId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Perfil con ese Nombre"]);
				}
				$obj = Profile::find($profileId);
			}
			$obj->name = $request->name;
			$obj->code = $request->code;
			$obj->status = $request->status;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Perfil Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
		print_r($request->all()); dd();
	}
	public function show(Request $request)
	{
		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => Profile::find($request->masterId)]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		
	}
}