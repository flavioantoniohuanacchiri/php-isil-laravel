<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Categoria;
use DB;

class CategoriaController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Categoria",
			"url_controller" => "categoria",
			"url" => "categoria",
			"categoria" => Categoria::where("status", 1)->get()->toArray() 
			 
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Categoria::get()
	        )->addColumn('action', function ($data){
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("categoria", compact("site"));
		
	}
	public function store(Request $request)
	{
		$categoriaId = $request->has("masterId")? $request->masterId : null;
		if ($request->code == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Código de categoria"]);
		}
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($categoriaId)) {
				$objTmp =Categoria::where("code", $request->code)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una Categoria con ese código"]);
				}
				$obj = new Categoria;
			} else {
				$objTmp = Categoria::where("code", $request->code)->where("id", "<>", $categoriaId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una categoria con ese código"]);
				}
				$obj = Categoria::find($categoriaId);
			}
			$obj->code = $request->code;
            $obj->name = $request->name;			
			$obj->status = $request->status;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Categoria Creada"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Categoria::find($masterId);
		$categoria = $obj->categoria;

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
		$obj = Categoria::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Categoria Eliminada Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}