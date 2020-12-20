<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ViewHelper;
use App\Articulos;
use App\Categoria;
use DB;

class ArticulosController extends Controller
{
  public function index(Request $request)
  {
    $site = [
      "name" => "Articulos",
      "url_controller" => "articulos",
      "url" => "articulos",
      "articulos" => Articulos::where("status", 1)->get()->toArray(),
      "categoria" => Categoria::where("status", 1)->get()->toArray() 
       
    ];
    if ($request->ajax()) {
      return datatables()->of(
              Articulos::with("categoria")->get()
          )->addColumn('action', function ($data){
                return ViewHelper::allButtons($data);
            })->toJson();
    }
    return view("articulos", compact("site"));
    
  }
  public function store(Request $request)
  {
    $articulosId = $request->has("masterId")? $request->masterId : null;
    if ($request->code == "") {
      return response(["rst" => 2, "obj" => [], "msj" => "Necesita Ingresar un Código de articulo"]);
    }
    DB::beginTransaction();
    try {
      $obj = null;
      if (is_null($articulosId)) {
        $objTmp = Articulos::where("code", $request->code)->first();
        if (!is_null($objTmp)) {
          return response(["rst" => 2, "obj" => [], "msj" => "Existe un Articulo con ese código"]);
        }
        $obj = new Articulos;
      } else {
        $objTmp = Articulos::where("code", $request->code)->where("id", "<>", $articulosId)->first();
        if (!is_null($objTmp)) {
          return response(["rst" => 2, "obj" => [], "msj" => "Existe un Articulo con ese código"]);
        }
        $obj = Articulos::find($articulosId);
      }
      $obj->code = $request->code;
            $obj->name = $request->name;  
            $obj->categoria_id= $request->categoria_id;    
      $obj->status = $request->status;

      $obj->save();
      DB::commit();
      return response(["rst" => 1, "obj" => $obj, "msj" => "Articulos Creado"]);
    } catch (Exception $e) {
      DB::rollback();
      return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
    }
  }
  public function show(Request $request)
  {
    $masterId = $request->has("masterId")? $request->masterId : null;
    $obj = Articulos::find($masterId);
    $articulos = $obj->articulos;

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
    $obj = Articulos::find($masterId);
    if (!is_null($obj)) {
      $obj->delete();
      return response(["rst" => 1, "msj" => "Articulo Eliminado Correctamente"]);
    }
    return response(["rst" => 2, "msj" => "Hubo un Error"]);
  }
}