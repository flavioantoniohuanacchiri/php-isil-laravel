<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Product;
use App\Category;
use App\Attribute;
use DB;

class ProductController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Producto",
			"url_controller" => "product",
			"url" => "product",
			"category" => Category::where("status", 1)->get()->toArray(),
			"attribute" => Attribute::where("status", 1)->get()->toArray()
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Product::with("category","attribute")->get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("product", compact("site"));
		
	}
	public function store(Request $request)
	{
		$productId = $request->has("masterId")? $request->masterId : null;
		if ($request->code == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Código de Producto"]);
		}
		if ($request->name == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Nombre de Producto"]);
		}
		if ($request->category_id == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita seleccionar una Categoría de Producto"]);
		}
		if ($request->attribute_id == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita seleccionar un Atributo de Producto"]);
		}
		if ($request->status == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita seleccionar un Estado"]);
		}
		
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($productId)) {
				$objTmp = Product::where("code", $request->code)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Producto con ese código"]);
				}
				$obj = new Product;
			} else {
				$objTmp = Product::where("code", $request->code)->where("id", "<>", $productId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Producto con ese código"]);
				}
				$obj = Product::find($productId);
			}
			$obj->code = $request->code;
			$obj->name = $request->name;
			$obj->status = $request->status;
			$obj->category_id = $request->category_id;
			$obj->attribute_id = $request->attribute_id;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Producto Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => Product::find($request->masterId)]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Product::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Producto Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}