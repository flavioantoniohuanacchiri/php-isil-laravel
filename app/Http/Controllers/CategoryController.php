<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Category;
use DB;

class CategoryController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Categorias",
			"url_controller" => "category",
			"url" => "category",
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Category::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("category", compact("site"));
		
	}
	public function store(Request $request)
	{
		$categoryId = $request->has("masterId")? $request->masterId : null;
		if ($request->name == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un nombre de Categoría"]);
		}
		if ($request->status == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Seleccionar un estado de Categoría"]);
		}
		
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($categoryId)) {
				$objTmp = Category::where("name", $request->name)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una Categoría con ese Nombre"]);
				}
				$obj = new Category;
			} else {
				$objTmp = Category::where("name", $request->name)->where("id", "<>", $categoryId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe una Categoría con ese Nombre"]);
				}
				$obj = Category::find($categoryId);
			}
			$obj->name = $request->name;
			$obj->status = $request->status;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Categoría Creada"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => Category::find($request->masterId)]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Category::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Categoría Eliminada Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}