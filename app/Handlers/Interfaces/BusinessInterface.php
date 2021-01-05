<?php namespace App\Handlers\Interfaces;

interface BusinessInterface
{
	public function create($business = []);
	public function update($businessId = null, $business = []);
}