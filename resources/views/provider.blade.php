@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_business{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Listado de Proveedores
@endsection
@section('columns_head')
<tr>
    <th>Nombre</th>
    <th>Tipo de documento</th>
    <th>Numero de documento</th>
    <th>Giro</th>
    <th>Estado</th>
    <th>Actualizado</th>
    <th class="column-options">[]</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
    	{"data": "name"},
        {"data": "document_type"},
        {"data": "document_number"},
        {"data": "giro"},
        {"data": "status"},
        {"data" : "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Cliente";
    confirmDelete["textMessage"] = "¿Desea Eliminar este Cliente?";
</script>
@endsection
@push("js_master")
<script type="text/javascript">
    functionRowTable = function(nRow, aData) {
        if (aData!=null && aData!="null" && aData["status"] !=null && aData["status"] !="null") {
            let htmlTmp = Master.htmlStatus(aData['status']);
            $(nRow).find('td:eq(4)').html(htmlTmp);
        }
    };
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
        <label>Nombre Del Proveedor*</label>
        <input type="text" name="name" class="form-control" />
    </div>
    
    <div class="form-group">
        <label>Tipo de documento *</label>
        <select class="form-control select2" name="document_type" data-placeholder="Seleccione un Tipo de Documento" style="width: 100%;">
            <option value="">Seleccione</option>
            <option value="DNI">DNI</option>
            <option value="CE">CE</option>
            <option value="Pasaporte">Pasaporte</option>
        </select>
    </div>
    <div class="form-group">
        <label>Numero de documento *</label>
        <input type="text" name="document_number" class="form-control" />
    </div>
    <div class="form-group">
        <label>Giro *</label>
        <input type="text" name="giro" class="form-control"/>
    </div>
  
    <div class="form-group">
        <label>Estado *</label>
        <select class="form-control select2" name="status" data-placeholder="Seleccione un Estado" style="width: 100%;">
            <option value="">Seleccione</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
@endsection