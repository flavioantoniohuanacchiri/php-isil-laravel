@extends('layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
<div class="card">
    <div class="card-header">
        Editar Venta
    </div>

    <div class="card-body">
        <form action="{{ route('venta.update', [$venta->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
                <label for="customer_name">Nombre del cliente</label>
                <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control" value="{{ old('nombre_cliente', isset($venta) ? $venta->nombre_cliente : '') }}" required>
                @if($errors->has('nombre_cliente'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nombre_cliente') }}
                    </em>
                @endif

            </div>
            <div class="form-group {{ $errors->has('email_cliente') ? 'has-error' : '' }}">
                <label for="email_cliente">Email del cliente</label>
                <input type="email" id="email_cliente" name="email_cliente" class="form-control" value="{{ old('email_cliente', isset($venta) ? $venta->email_cliente : '') }}">
                @if($errors->has('email_cliente'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email_cliente') }}
                    </em>
                @endif

            </div>
            <div class="card">
                <div class="card-header">
                    Selección de Productos
                </div>

                <div class="card-body">
                    <table class="table table-bventaed table-striped table-bordered table-hover" id="productos_table">
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (old('producto', $venta->producto->count() ? $venta->producto : ['']) as $venta_producto)
                            <tr id="producto{{ $loop->index }}">
                                <td>
                                    <select name="producto[]" class="form-control">
                                        <option value="">-- seleccione un producto --</option>
                                        @foreach ($productos_all as $producto)
                                            <option value="{{ $producto->id }}"
                                                @if (old('producto.' . $loop->parent->index, optional($venta_producto)->id) == $producto->id) selected @endif
                                            >{{ $producto->nombre }} (${{ number_format($producto->precio, 2) }})</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantities[]" class="form-control"
                                           value="{{ (old('quantities.' . $loop->index) ?? optional(optional($venta_producto)->pivot)->quantity) ?? '1' }}" />
                                </td>
                            </tr>
                        @endforeach
                        <tr id="producto{{ count(old('producto', $venta->producto->count() ? $venta->producto : [''])) }}"></tr>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                            <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input style="margin-top:20px;" class="btn btn-danger" type="submit" value="Grabar">
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Regresar</a>
            </div>
            
        </form>
    </div>
</div>

    </div>
</div>
@endsection

@push("js")
<script>
    $(document).ready(function(){
      let row_number = {{ count(old('producto', $venta->producto->count() ? $venta->producto : [''])) }};
      $("#add_row").click(function(e){
        e.preventDefault();
        let new_row_number = row_number - 1;
        $('#producto' + row_number).html($('#producto' + new_row_number).html()).find('td:first-child');
        $('#productos_table').append('<tr id="producto' + (row_number + 1) + '"></tr>');
        row_number++;
      });

      $("#delete_row").click(function(e){
        e.preventDefault();
        if(row_number > 1){
          $("#producto" + (row_number - 1)).html('');
          row_number--;
        }
      });
    });
  </script>
@endpush


