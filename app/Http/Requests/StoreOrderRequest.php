<?php

namespace App\Http\Requests;

use App\Venta;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nombre_cliente' => [
                'required',
            ],
        ];
    }
}
