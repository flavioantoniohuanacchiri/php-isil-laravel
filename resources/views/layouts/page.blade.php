@extends('layouts.app')
@push("css")
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <style type="text/css">
        .buttons-header{
            display: inline-flex;
            float: right;
            vertical-align: top;
            width: auto;
        }
        .buttons-header i{
            margin-right: 5px;
        }
        .card-title{
            font-weight: 700;
            vertical-align: middle;
            line-height: 40px;
        }
        .setting{
            margin-left: 5px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
        }
        th, td {
            text-align: center;
        }
    </style>
@endpush
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            @yield("title_list")
                        </h3>
                        <div class="buttons-header" style=''>
                            <button type="button" class="btn btn-primary" id="btn-create"><i class="fas fa-plus"></i> Nuevo</button>
                            @yield("button_header")
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table-list" class="table table-bordered table-hover">
                            <thead>
                                @yield("columns_head")
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@include("modals._modal_store")
@include("modals._modal_setting")
@stack("modal")
<script type="text/javascript">
    var objModel = {};
    var confirmDelete = {"confirmButtonText" : "Si Eliminar", "cancelButtonText" : "No, no deseo eliminar!!!"};
    var columnsTable = [];
</script>
@if(isset($site))
    <script type="text/javascript">
        objModel.name = "";
        objModel.url_controller = "{{$site['url_controller']}}";
    </script>
@endif
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
      "lengthChange": false,
      "searching": false,
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