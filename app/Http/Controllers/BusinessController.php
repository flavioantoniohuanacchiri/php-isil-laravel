<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business;

class BusinessController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			return datatables()->of(
	            Business::get()
	        )->toJson();
		}
		return view("business");
		
	}
	public function store(Request $request)
	{
		
	}
	public function show(Request $request)
	{
		
	}
	public function update(Request $request)
	{
		
	}
	public function destroy(Request $request)
	{
		
	}
}