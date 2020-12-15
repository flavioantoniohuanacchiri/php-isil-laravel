@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_business{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Listado de Modulos
@endsection
@section('columns_head')
<tr>
    <th>Nombre</th>
    <!--<th>Apellidos</th>
    <th>Usuario</th>-->
    <th>Clase de Icono </th>
    <th>Orden</th>
    <th>Estado</th>
    <th>Actualizado</th>
    <th class="column-options">[]</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
    	{"data": "name"},
        /*{"data": "full_name"},
        {"data": "last_name"},
        {"data": "user_name"},*/
        {"data": "class_icon"},
        {"data": "order"},
        {"data": "status"},
        {"data" : "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Modulo";
    confirmDelete["textMessage"] = "¿Desea Eliminar este Modulo?";
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
        <label>Nombre *</label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label>Clase de icono *</label>
        <input type="text" name="class_icon" class="form-control" required />
    </div>
    <div class="form-group">
        <label>Orden *</label>
        <input type="text" name="order" class="form-control" required />
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