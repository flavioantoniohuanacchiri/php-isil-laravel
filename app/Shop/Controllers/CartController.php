<?php

namespace App\Shop\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Master\Models\Producto;
use App\Master\Models\ItemSede;
use App\DAO\Interfaces\Master\ListItemI;
use App\DAO\Interfaces\Configuration\ListConfigSiteI;

class CartController extends Controller
{
    protected $_listItemI;
    protected $_listConfigSiteI;

    public function __construct(
        ListItemI $listItemI,
        ListConfigSiteI $listConfigSiteI
    )
    {
        $this->_listItemI = $listItemI;
        $this->_listConfigSiteI = $listConfigSiteI;
    }
    public function add(Request $request)
    {
        $product = Product::find($request->id);
        $item = ItemSede::with("producto", "producto.imagen", "combo")->where("id", $request->id)->first();
        $urlImagen = $this->_listConfigSiteI->getKey("url_folder_image_items");
        if (!is_null($item)) {
            @$item->imagen = isset($request->urlImagen)? $request->urlImagen : "";
            Cart::add($item->id, $item->producto->nombre, $item->precio, $request->cantidad, array("item" => $item));
            return response(["rst" => 1, "msj" => $item->producto->nombre." ha sido añadido al Carrito!", "obj" => $item]);
        }
        return response(["rst" => 2, "msj" => "$item->producto->nombre no se agrego al Carrito!"]);
    }
    public function remove(Request $request)
    {
        $item = !is_null($request->item)? $request->item : null;

        if (!is_null($item) && is_array($item)) {
            Cart::remove($item["id"]);
            return response(["rst" => 1, "obj" => null]);
        }
        return response(["rst" => 2, "msj" => "Error al eliminar Item!!!"]);
    }
    public function get()
    {
        return response(json_decode(json_encode(Cart::getContent()), true));
    }
    public function cart()
    {
        $params = [
            'title' => 'Carrito de Compra - Detalle'
        ];
        return view('cart')->with($params);
    }
    public function billing()
    {
        $params = [
            'title' => 'Carrito de Compra - Checkout'
        ];
        if (\Auth::user()) {
            if (count(Cart::getContent()) <= 0) {
                return redirect("cart-checkout");
            }
            return view('billing')->with($params);
        } else {
            $params = [
                "title" => "Acceso de Usuario"
            ];
            return view("auth.login")->with($params);
        }
    }
    public function clear()
    {
        Cart::clear();
        return back()->with('success',"Se ha limpiado el Carrito de Compra Correctamente!");;
    }
    public function saveBilling(Request $request)
    {

    }
    public function saveDelivery(Request $request)
    {

    }
    public function successOrder(Request $request)
    {
        $orderCode = isset($request->orderCode)? $request->orderCode : "";
        if (count(Cart::getContent()) <= 0) {
            return redirect("/");
        }
        return view("success")->with(["orderCode" => $orderCode]);
    }
}