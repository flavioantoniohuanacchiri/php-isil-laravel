<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			return datatables()->of(
	            User::get()
	        )->toJson();
		}
		return view("user");
		
	}
	public function store(Request $request)
	{
		
	}
	public function show(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		
	}
}