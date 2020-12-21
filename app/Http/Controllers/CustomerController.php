<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Customer;
use DB;

class CustomerController extends Controller
{
	public function index(Request $request)
	{
		$site = [
			"name" => "Clientes",
			"url_controller" => "customer",
			"url" => "customer",
		];
		if ($request->ajax()) {
			return datatables()->of(
	            Customer::get()
	        )->addColumn('action', function ($data){
                //return DataTableHelper::buttonsActionsByPerfil(\Auth::user()->profile, $url, $data);
                return ViewHelper::allButtons($data);
            })->toJson();
		}
		return view("customer", compact("site"));
		
	}
	public function store(Request $request)
	{
		$customerId = $request->has("masterId")? $request->masterId : null;
		if ($request->name == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita ingresar un Nombre"]);
		}
		if ($request->document_type == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita seleccionar un Tipo de Documento"]);
		}
		if ($request->document_number == "") {
			return response(["rst" => 2, "obj" => [], "msj" => "Necesita ingresar un Documento"]);
		}
		
		DB::beginTransaction();
		try {
			$obj = null;
			if (is_null($customerId)) {
				$objTmp = Customer::where("document_number", $request->document_number)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Cliente con ese Documento"]);
				}
				$obj = new Customer;
			} else {
				$objTmp = Customer::where("document_number", $request->document_number)->where("id", "<>", $customerId)->first();
				if (!is_null($objTmp)) {
					return response(["rst" => 2, "obj" => [], "msj" => "Existe un Cliente con ese Documento"]);
				}
				$obj = Customer::find($customerId);
			}
			$obj->name = $request->name;
			$obj->address = $request->address;
			$obj->zip = $request->zip;
			$obj->document_number = $request->document_number;
			$obj->document_type = $request->document_type;
			$obj->status = $request->status;

			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Cliente Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function show(Request $request)
	{
		if (!is_null($request->masterId)) {
			return response(["rst" => 1, "obj" => Customer::find($request->masterId)]);
		}
		return response(["rst" => 2, "obj" => [], "msj" => ""]);
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		$masterId = $request->has("masterId")? $request->masterId : null;
		$obj = Customer::find($masterId);
		if (!is_null($obj)) {
			$obj->delete();
			return response(["rst" => 1, "msj" => "Cliente Eliminado Correctamente"]);
		}
		return response(["rst" => 2, "msj" => "Hubo un Error"]);
	}
}