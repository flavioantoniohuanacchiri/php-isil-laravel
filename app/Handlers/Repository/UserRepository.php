<?php namespace App\Handlers\Repository;

use App\Handlers\Interfaces\UserInterface;
use App\User;
use DB;

class UserRepository implements UserInterface
{
	public function create($user = []) {
		DB::beginTransaction();
		try {
			$obj = new User;
			$obj->name = $user["full_name"]." ".$user["full_name"];
			$obj->full_name = $user["full_name"];
			$obj->last_name = $user["last_name"];
			$obj->email = $user["email"];
			$obj->user_name = $user["user_name"];
			$obj->document_number = $user["document_number"];
			$obj->profile_id = $user["profile_id"];

			if ($user["password"] !="") {
				$obj->password = \Hash::make($user["password"]);
			}
			$obj->save();
			DB::commit();
			return response(["rst" => 1, "obj" => $obj, "msj" => "Usuario Creado"]);
		} catch (Exception $e) {
			DB::rollback();
			return response(["rst" => 2, "obj" => [], "msj" => $e->getMessage()]);
		}
	}
	public function update($userId = null, $user = []) {
		DB::beginTransaction();
		try {
			$obj = User::find($userId);
			$obj->name = $user["full_name"]." ".$user["full_name"];
			$obj->full_name = $user["full_name"];
			$obj->last_name = $user["last_name"];
			$obj->email = $user["email"];
			$obj->user_name = $user["user_name"];
			$obj->document_number = $user["document_number"];
			$obj->profile_id = $user["profile_id"];

			if ($user["password"] !="") {
				$obj->password = \Hash::make($user["password"]);
			}
			$obj->save();
			DB::commit();
			return ["rst" => 1, "obj" => $obj, "msj" => "Usuario Actualizado"];
		} catch (Exception $e) {
			DB::rollback();
			return ["rst" => 2, "obj" => [], "msj" => $e->getMessage()];
		}
	}
}