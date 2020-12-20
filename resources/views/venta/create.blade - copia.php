@extends('layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
<div class="card">
    <div class="card-header">
        Venta
    </div>

    <div class="card-body">
        <form action="{{ route('venta.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nombre_cliente') ? 'has-error' : '' }}">
                <label for="nombre_cliente">Nombre del cliente*</label>
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
                    Productos
                </div>

                <div class="card-body">
                    <table class="table" id="productos_table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (old('productos', ['']) as $index => $oldProducto)
                                <tr id="producto{{ $index }}">
                                    <td>
                                        <select name="productos[]" class="form-control">
                                            <option value="">-- seleccione un producto --</option>
                                            @foreach ($productos as $producto)
                                                <option value="{{ $producto->id }}"{{ $oldProducto = $producto->id ? ' selected' : '' }}>
                                                    {{ $producto->nombre }} (${{ number_format($producto->precio, 2) }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="quantities[]" class="form-control" value="{{ old('quantities.' . $index) ?? '1' }}" />
                                    </td>
                                </tr>
                            @endforeach
                            <tr id="producto{{ count(old('productos', [''])) }}"></tr>
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
                <input class="btn btn-danger" type="submit" value="Grabar">
            </div>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Regresar
            </a>
        </form>
    </div>
</div>
</div>
</div>
@endsection


@push("js")
<script>
    $(document).ready(function(){
      let row_number = {{ count(old('productos', [''])) }};
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