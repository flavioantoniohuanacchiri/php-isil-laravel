@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_business{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Listado de Empresas
@endsection
@section('columns_head')
<tr>
    <th>RUC</th>
    <th>Razón Social</th>
    <th>Dirección</th>
    <th>Ubigeo</th>
    <th>Estado</th>
=======
    <th>Razón Social</th>
    <!--<th>Apellidos</th>
    <th>Usuario</th>-->
    <th>RUC</th>
    <th>Dirección</th>
    <!--<th>Estado</th>
    <th>Intentos</th>-->
>>>>>>> master
    <th>Actualizado</th>
    <th class="column-options">[]</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [

    	{"data": "number_identifer"},
        {"data": "name"},
        {"data": "address"},
        {"data": "ubigeo"},
        {"data": "status"},
        {"data" : "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Empresas";
    confirmDelete["textMessage"] = "¿Desea Eliminar esta Empresa?";

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
     <label><input type="checkbox" id="belongs_business"><span>Pertenece a una Empresa</span></label>
    </div>
    <div class="form-group">
        <label>Razón Social *</label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label>RUC *</label>
        <input type="text" name="number_identifer" class="form-control" required />
    </div>
    <div class="form-group">
        <label>Dirección *</label>
        <input type="text" name="address" class="form-control" />
    </div>
    <div class="form-group">
        <label>Ubigeo *</label>
        <input type="text" name="ubigeo" class="form-control" />
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