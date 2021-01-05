<?php namespace App\Handlers\Interfaces;

interface UserInterface
{
	public function create($user = []);
	public function update($userId = null, $user = []);
}