@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_business{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Listado de Usuarios
@endsection
@section('columns_head')
<tr>
    <th>Nombres</th>
    <th>Email</th>
    <th>Perfil</th>
    <th>Estado</th>
    <th>Actualizado</th>
    <th class="column-options">Acción</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
    	{"data": "name"},
        {"data": "email"},
        {"data": function ( row, type, val, meta ) 
            {
                let profile = "";
                if (row.profile!=null && row.profile !="null") 
                {
                    return row.profile.name;
                }
            return "";
            },
            name: 'profile_id'},
        {"data": "status"},
        {"data": "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Usuario";
    confirmDelete["textMessage"] = "¿Desea Eliminar este Usuario?";
</script>
@endsection
@push("js_master")
<script type="text/javascript">
    functionRowTable = function(nRow, aData) {
        if (aData!=null && aData!="null" && aData["status"] !=null && aData["status"] !="null") {
            let htmlTmp = Master.htmlStatus(aData['status']);
            $(nRow).find('td:eq(3)').html(htmlTmp);
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
        <label>Nombres *</label>
        <input type="text" name="full_name" class="form-control" required/>
    </div>
    <div class="form-group">
        <label>Apellidos *</label>
        <input type="text" name="last_name" class="form-control" required />
    </div>
    <div class="form-group">
        <label>Email *</label>
        <input type="email" name="email" class="form-control" required/>
    </div>
    <div class="form-group">
        <label>Nombre de Usuario *</label>
        <input type="text" name="user_name" class="form-control" required />
    </div>
    <div class="form-group">
        <label>DNI *</label>
        <input type="text" name="document_number" class="form-control solo-enteros" minlength="8" maxlength="8" required />
    </div>
    <div class="form-group">
        <label>Perfiles</label>
        <select name="profile_id" class="form-control select2" data-placeholder="Seleccione un Perfil" style="width: 100%;">
            <option value="">Seleccione</option>
            @if(isset($site["profile"]))
            	@foreach($site["profile"] as $key => $value)
            	<option value="{{$value['id']}}">{{$value['name']}}</option>
            	@endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label>Contraseña *</label>
        <input type="text" name="password" class="form-control" required/>
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