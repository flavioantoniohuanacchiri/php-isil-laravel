<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\User;
use App\Profile;
use App\Business;
use App\Events\UserCreated;
use App\Handlers\Interfaces\UserInterface;
use DB;

class UserController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Usuarios",
			"url_controller" => "user",
			"url" => "user",
			"profile" => Profile::where("status", 1)->get()->toArray(),
			"business" => Business::where("status", 1)->get()->toArray()
		];
		if ($request->ajax()) {
			return datatables()->of(
	            User::with([
	            	"profile" => function($q) {
	            		$q->select("id", "name");
	            		//$q->where("status", 0);
	            	},
	            	"business" => function($q) {
	            		$q->select("id", "name", "number_identifer");
	            		//$q->where("number_identifer", "like", "%35%");
	            	}
	        	])->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("user", compact("site"));
		
	}
	public function store(
		Request $request,
		UserInterface $userInterface
	){
		$userId = $request->has("masterId")? $request->masterId : null;
		if ($request->document_number == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Documento"]);
		}
		//DB::beginTransaction();
		//try {
			$obj = null;
			if (is_null($userId)) {
				$objTmp = User::where("document_number", $request->document_number)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Usuario con Tu Documento"]);
				}
				$obj = new User;
			} else {
				$objTmp = User::where("document_number", $request->document_number)->where("id", "<>", $userId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Usuario con Tu Documento"]);
				}
				$obj = User::find($userId);
			}
			if (is_null($userId)) {
				return response($userInterface->create($request->all()));
			} else {
				return response($userInterface->update($userId, $request->all()));
			}
			//DB::commit();
			if (is_null($userId)) {
				//event(new UserCreated($obj));
			}
			return response(["rst" => 1, "obj" => $obj, "msj" => "Usuario Creado"]);
		//} catch (Exception $e) {
			//DB::rollback();
			//return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		//}
	}
	public function show(Request $request)
	{
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
		$obj = User::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Usuario Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}