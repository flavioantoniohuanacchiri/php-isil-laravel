<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Venta;
use App\Producto;
use Symfony\Component\HttpFoundation\Response;
use DB;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('productos')->get();

        return view('venta.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('venta.create', compact('productos'));
    }

    public function store(StoreOrderRequest $request)
    {
        DB::beginTransaction();
		try {
            $venta = Venta::create($request->all());
            
            $productos = $request->input('productos', []);
         
            $quantities = $request->input('quantities', []);

            //dd($productos);
            for ($producto =0; $producto < count($productos); $producto ++) {
                if ($productos[$producto] != '') {
                    $venta->productos()->attach($productos[$producto], ['quantity' => $quantities[$producto]] );
                }
            }
          DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect()->route('venta.index');
    }

    public function edit($ventaid)
    {
        $venta = Venta::find($ventaid);
        $productos_all = Producto::all();

        $venta->load('productos');

        //dd($venta);
        return view('venta.edit', compact('productos_all', 'venta'));
    }

    public function update(UpdateOrderRequest $request, $ventaid)
    {
        $venta = Venta::find($ventaid);
        $venta->update($request->all());

        $venta->productos()->detach();
        $productos = $request->input('productos', []);
        $quantities = $request->input('quantities', []);
        for ($producto =0; $producto < count($productos); $producto++) {
            if ($productos[$producto] != '') {
                $venta->productos()->attach($productos[$producto], ['quantity' => $quantities[$producto]] );
            }
        }

        return redirect()->route('venta.index');
    }

    public function show($ventaid)
    {
        $venta = Venta::find($ventaid);
        $venta->load('productos');

        return view('venta.show', compact('venta'));
    }

    public function destroy($ventaid)
    {
        $venta = Venta::find($ventaid);
        if(!is_null($venta))
            $venta->delete();
        
        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Venta::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
