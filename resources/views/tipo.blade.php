@extends('layouts.page')
@push("css")
<style type="text/css">
    #belong-profile{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Listado de Tipos
@endsection
@section('columns_head')
<tr>
    <th>Codigo</th>
    <th>Descripcion</th>
    <th>Estado</th> 
    <th>Actualizado</th>
    <th class="column-options">[]</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
    	{"data": "code"},
        {"data": "name"},
        {"data": "status"},  
        {"data" : "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de la tipo";
    confirmDelete["textMessage"] = "¿Desea Eliminar esta tipo?";
</script>
@endsection
@push("js_master")
<script type="text/javascript">
    functionRowTable = function(nRow, aData) {
        if (aData!=null && aData!="null" && aData["status"] !=null && aData["status"] !="null") {
            let htmlTmp = Master.htmlStatus(aData['status']);
            $(nRow).find('td:eq(2)').html(htmlTmp);
        }
    };
    $("#mdlStore").on("hide.bs.modal", function(event) {
        $("#tipoId").val([]).trigger("change");
    });
</script>
@endpush
@section("content_form_modal")
   
    <div class="form-group" >
        <label>Codigo *</label>
        <input type="text" name="code" class="form-control" />
    </div>
    <div class="form-group" >
        <label>Descripción *</label>
        <input type="text" name="name" class="form-control" required />
    </div>
    <div class="form-group" >
        <label>Estado *</label>
        <select class="form-control select2" name="status" data-placeholder="Seleccione un Estado" style="width: 100%;">
            <option value="">Seleccione</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
@endsection