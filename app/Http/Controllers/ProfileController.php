<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\User;
use App\Profile;
use App\Business;
use DB;

class ProfileController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Profile",
			"url_controller" => "profile",
			"url" => "profile",
			"profile" => Profile::where("status", 1)->get()->toArray() 
			 
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
		if ($request->code == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Código"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($profileId)) {
				$objTmp = Profile::where("code", $request->code)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Profile con ese código"]);
				}
				$obj = new Profile;
			} else {
				$objTmp = Profile::where("code", $request->code)->where("id", "<>", $profileId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Profile con ese código"]);
				}
				$obj = Profile::find($profileId);
			}
			$obj->code = $request->code;
			$obj->name = $request->name;			
			$obj->status = $request->status;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Perfil Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Profile::find($masterId);
		$profile = $obj->profile;

		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => $obj, "msj" => ""]);
			/**return response(["rst" => 1, "obj" => User::with("business", "businessTwo")->find($request->masterId)]);*/
			/**return response(["rst" => 1, "obj" => Profile::with("profile", "profile")->find($request->masterId)]);*/
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Profile::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Profile Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}