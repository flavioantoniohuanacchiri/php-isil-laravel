@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_profile{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Listado de Perfiles
@endsection
@section('columns_head')
<tr>
    <th>Perfil ID</th>
    <th>Perfil</th>
    <th>Descripción</th>
    <th>Estado</th>
    <!--<th>Estado</th>
    <th>Intentos</th>-->
    <th>Actualizado</th>
    <th class="column-options">[]</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
    	{"data": "profile_id"},
        {"data": "name"},
        {"data": "descripcion"},
        {"data": "status"},
       /*{"data": "status"},
        {"data": "num_intentos"},*/
        {"data" : "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Perfil";
    confirmDelete["textMessage"] = "¿Desea Eliminar este Perfil?";
</script>
@endsection
@push("js_master")
<script type="text/javascript">
    functionRowTable = function(nRow, aData) {
        if (aData!=null && aData!="null" && aData["status"] !=null && aData["status"] !="null") {
            let htmlTmp = Master.htmlStatus(aData['status']);
            $(nRow).find('td:eq(6)').html(htmlTmp);
        }
    };
    $("#belongs_profile").click(function(e) {
        $("#profileId").val([]).trigger('change');
        if ($(this).is(":checked")) {
            $("#div-profile").css("display", "block");
        } else {
            $("#div-profile").css("display", "none");
        }
    });
    $("#mdlStore").on("hide.bs.modal", function(event) {
        $("#belongs_profile").prop("checked", false);
        $("#profileId").val([]).trigger("change");
        $("#div-profile").css("display", "none");
    });
</script>
@endpush
@section("content_form_modal")
    <div class="form-group">
        <label><input type="checkbox" id="belongs_profile"><span>Pertenece a un Perfil</span></label>
    </div>
   
    <div class="form-group">
        <label>Nombre Perfil *</label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label>Descripcion *</label>
        <input type="text" name="descripcion" class="form-control" required />
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