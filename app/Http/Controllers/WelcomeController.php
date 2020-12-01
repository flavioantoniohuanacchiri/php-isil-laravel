<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
	public function viewWelcome()
	{
		return view('welcome');
	}
	public function viewDashboard()
	{
		return view('dashboard');
	}
}