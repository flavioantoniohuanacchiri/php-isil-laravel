@extends('layouts.page')
@section('content')
<section class="content">
    <div class="container-fluid">
<div class="card">
    <div class="card-header">
        Venta
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bventaed table-striped table-bordered table-hover">
                <tbody >
                    <tr class="text-left">
                        <th class="text-left">
                            ID
                        </th>
                        <td class="text-left">
                            {{ $venta->id }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">
                            CLIENTE
                        </th class="text-left">
                        <td class="text-left">
                            {{ $venta->nombre_cliente }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">
                            EMAIL
                        </th>
                        <td class="text-left">
                            {{ $venta->email_cliente }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">
                            Productos
                        </th>
                        <td class="text-left">
                            
                            @foreach($venta->productos as $id => $productos)
                              
                                <li>{{ $productos->nombre }} ({{ $productos->pivot->quantity }} x ${{ $productos->precio }})</li>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Regresar
            </a>
        </div>

    </div>
</div>
    </div>
</div>
@endsection