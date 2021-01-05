<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\User;

class TestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getPDFUser()
    {
        $users = User::all();
        $ancho = 200;
        $largo = 300;
        $filename = "Comprobante_".date("YmdHis").".pdf";
        return PDF::loadView("print.usersAll", compact("users"))
            ->setOption('encoding', 'UTF-8')->setOption('page-width', $ancho)
            ->setOption('page-height', $largo)
            ->setOption('margin-top', 2.5)
            ->setOption('margin-bottom', 2.5)
            ->setOption('margin-left', 2.5)
            ->setOption('margin-right', 2.5)
            ->stream($filename);
    }
}
