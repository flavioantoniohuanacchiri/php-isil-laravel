<?php namespace App\Helpers;

class ViewHelper
{
	public static function allButtons($data)
	{
		$buttons = [
			"E" => [
				"row" => $data,
				"class" => "btn-info prepare",
				"icon" => "fas fa-pencil-alt"
			],
			"D" => [
				"row" => $data,
				"class" => "btn-danger destroy delete",
				"icon" => "fas fa-trash-alt"
			],
		];
		return view("partials.buttons.buttons_template", compact("buttons"));
	}
}