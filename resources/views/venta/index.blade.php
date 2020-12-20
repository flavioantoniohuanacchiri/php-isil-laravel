@extends('layouts.app')

@push("css")
<link rel="stylesheet" href="{{ asset('adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('venta.create') }}">
                            Agregar
                        </a>
                    </div>
                </div>
            
                <div class="card">
                    <div class="card-header">
                        Ventas
                    </div>
                    <div class="card-body">
                        <table id="table-list" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        Codigo
                                    </th>
                                    <th>
                                        Cliente
                                    </th>
                                    <th>
                                        Correo
                                    </th>
                                    <th>
                                        Productos
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($venta as $key => $venta)
                                    <tr data-entry-id="{{ $venta->id }}">
                                        <td>
                                            {{ $venta->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $venta->nombre_cliente ?? '' }}
                                        </td>
                                        <td>
                                            {{ $venta->email_cliente ?? '' }}
                                        </td>
                                        <td>
                                            <ul>
                                            @foreach($venta->producto as $key => $item)
                                                <li>{{ $item->nombre }} ({{ $item->pivot->quantity }} x ${{ $item->precio }})</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                                <a class="btn btn-xs btn-primary" href="{{ route('venta.show', $venta->id) }}">
                                                    ver
                                                </a>
                                                <a class="btn btn-xs btn-info" href="{{ route('venta.edit', $venta->id) }}">
                                                    editar
                                                </a>
                                                <form action="{{ route('venta.destroy', $venta->id) }}" method="POST" 
                                                    onsubmit="return confirm('Estas seguro de eliminar');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="eliminar">
                                                </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@yield("script_master")
@endsection

@push("js")
<!-- DataTables -->
<script src="{{ asset('adminlte3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery.numeric.min.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script type="text/javascript" src="{{asset('js/master.js')}}"></script>
<script type="text/javascript" src="{{asset('js/master/default.js')}}"></script>
<script type="text/javascript">
    var tableList = $("#table-list").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $("select").select2();
    if (objModel!=null && objModel !="null") {
        confirmDelete["urlController"] = objModel.url_controller;
        if (objModel.url_controller !="") {
            tableList = Default.list(objModel.url_controller, columnsTable);
        }
    }
</script>
@stack("js_master")
@endpush