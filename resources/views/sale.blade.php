@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_business{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Listado de Ventas
@endsection
@section('columns_head')
<tr>
    <th>Código de venta</th>
    <th>Nombre del Cliente</th>
    <th>Fecha de Venta</th>
    <th>Total</th>
    <th>Actualizado</th>
    <th class="column-options">[]</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
        {"data": "id"},
    	{"data": function ( row, type, val, meta ) {
            let client = "";
            if (row.client!=null && row.client !="null") {
                return row.client.full_name;
            }
            return "";
        }, name: 'id_client'},
        {"data": "fcompra"},
        {"data": "total"},
        {"data" : "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Venta";
    confirmDelete["textMessage"] = "¿Desea Eliminar este Venta?";
</script>
@endsection
@push("js_master")
<script type="text/javascript">
   
   // functionRowTable = function(nRow, aData) {
   //     if (aData!=null && aData!="null" && aData["status"] !=null && aData["status"] !="null") {
   //         let htmlTmp = Master.htmlStatus(aData['status']);
   //         $(nRow).find('td:eq(2)').html(htmlTmp);
   //     }
   // };


    $("#belongs_business").click(function(e) {
        $("#businessId").val([]).trigger('change');
        if ($(this).is(":checked")) {
            $("#div-business").css("display", "block");
        } else {
            $("#div-business").css("display", "none");
        }
    });
    $("#mdlStore").on("hide.bs.modal", function(event) {
        $("#belongs_business").prop("checked", false);
        $("#businessId").val([]).trigger("change");
        $("#div-business").css("display", "none");
    });
</script>
@endpush
@section("content_form_modal")
    <div class="form-group">
        <a class="btn btn-primary" style="float: right" href="client" target="_blank"><i class="fas fa-plus"></i></a>
        <label>Nombre Del Cliente * </label>
        <select class="form-control select2" name="id_client" data-placeholder="Seleccione un Cliente" style="width: 100%;" required>
            <option value="">Seleccione</option>
            @if(isset($site["client"]))
                @foreach($site["client"] as $key => $value)
                <option value="{{$value['id']}}">{{$value['full_name']}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label>Fecha de Venta *</label>
        <input type="date" name="fcompra" class="form-control" required />
    </div>
    <div class="form-group">
        <label>Total (Se autocalculará al agregar el detalle) *</label>
        <input type="number" name="total" class="form-control"n readonly value="0" />
    </div>
@endsection