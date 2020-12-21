<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Cliente;
use App\Ventas;
use DB;

class ClienteController extends Controller
{
  public function index(Request $request)
  {
    $site = [
      "name" => "Cliente",
      "url_controller" => "cliente",
      "url" => "cliente",
      "cliente" => Cliente::where("status", 1)->get()->toArray(),
      "ventas" => Ventas::where("status", 1)->get()->toArray() 
       
    ];
    if ($request->ajax()) {
      return datatables()->of(
              Cliente::with("ventas")->get()
          )->addColumn('action', function ($data){
                return ViewHelper::allButtons($data);
            })->toJson();
    }
    return view("cliente", compact("site"));
    
  }
  public function store(Request $request)
  {
    $clienteId = $request->has("masterId")? $request->masterId : null;
    if ($request->code == "") {
      return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Código de cliente"]);
    }
    DB::beginTransaction();
    try {
      $obj = null;
      if (is_null($clienteId)) {
        $objTmp = Cliente::where("code", $request->code)->first();
        if (!is_null($objTmp)) {
          return response(["rst" => 2, "obj" => [], "msj" => "Existe un Cliente con ese código"]);
        }
        $obj = new Cliente;
      } else {
        $objTmp = Cliente::where("code", $request->code)->where("id", "<>", $clienteId)->first();
        if (!is_null($objTmp)) {
          return response(["rst" => 2, "obj" => [], "msj" => "Existe un Articulo con ese código"]);
        }
        $obj = Cliente::find($clienteId);
      }
      $obj->code = $request->code;
            $obj->name = $request->name;  
            $obj->ventas_id= $request->ventas_id;    
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
    $masterId = $request->has("masterId")? $request->masterId : null;
    $obj = Cliente::find($masterId);
    $cliente = $obj->cliente;

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
    $obj = Cliente::find($masterId);
    if (!is_null($obj)) {
      $obj->delete();
      return response(["rst" => 1, "msj" => "Cliente Eliminado Correctamente"]);
    }
    return response(["rst" => 2, "msj" => "Hubo un Error"]);
  }
}