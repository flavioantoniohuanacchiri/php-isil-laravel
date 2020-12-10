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
			"name" => "profiles",
			"url_controller" => "profile",
			"url" => "profile",
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Profile::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::profile()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("profile", compact("site"));
		
	}
	public function store(Request $request)
	{
		$profileId = $request->has("masterId")? $request->masterId : null;
		DB::beginTransaction();
		try {
			$obj = null;
			$obj = new Profile;
			$obj = Profile::find($profileId);
			
			$obj->profile_id = $request->profile_id;
			$obj->name = $request->name." ".$request->name;
			$obj->descripcion = $request->descripcion;
			$obj->status = $request->status;
					

		
			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Perfil Creado"]);
		}catch (Exception $e) {
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