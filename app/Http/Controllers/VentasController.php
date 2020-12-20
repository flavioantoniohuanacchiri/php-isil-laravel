<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Ventas;
use App\Articulos;
use DB;

class VentasController extends Controller
{
  public function index(Request $request)
  {
    $site = [
      "name" => "Ventas",
      "url_controller" => "ventas",
      "url" => "ventas",
      "ventas" => Ventas::where("status", 1)->get()->toArray(),
      "articulos" => Articulos::where("status", 1)->get()->toArray() 
       
    ];
    if ($request->ajax()) {
      return datatables()->of(
              Ventas::with("Articulos")->get()
          )->addColumn('action', function ($data){
                return ViewHelper::allButtons($data);
            })->toJson();
    }
    return view("ventas", compact("site"));
    
  }
  public function store(Request $request)
  {
    $ventasId = $request->has("masterId")? $request->masterId : null;
    if ($request->code == "") {
      return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Código de articulo"]);
    }
    DB::beginTransaction();
    try {
      $obj = null;
      if (is_null($ventasId)) {
        $objTmp = Ventas::where("code", $request->code)->first();
        if (!is_null($objTmp)) {
          return response(["rst" => 2, "obj" => [], "msj" => "Existe un Articulo con ese código"]);
        }
        $obj = new Ventas;
      } else {
        $objTmp = Ventas::where("code", $request->code)->where("id", "<>", $ventasId)->first();
        if (!is_null($objTmp)) {
          return response(["rst" => 2, "obj" => [], "msj" => "Existe un Articulo con ese código"]);
        }
        $obj = Ventas::find($ventasId);
      }
      $obj->code = $request->code;
            $obj->name = $request->name;  
            $obj->articulos_id= $request->articulos_id;    
      $obj->status = $request->status;

      $obj->save();
      DB::commit();
      return response(["rst" => 1, "obj" => $obj, "msj" => "Ventas Creado"]);
    } catch (Exception $e) {
      DB::rollback();
      return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
    }
  }
  public function show(Request $request)
  {
    $masterId = $request->has("masterId")? $request->masterId : null;
    $obj = Ventas::find($masterId);
    $ventas = $obj->ventas;

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
    $obj = Ventas::find($masterId);
    if (!is_null($obj)) {
      $obj->delete();
      return response(["rst" => 1, "msj" => "Articulo Eliminado Correctamente"]);
    }
    return response(["rst" => 2, "msj" => "Hubo un Error"]);
  }
}