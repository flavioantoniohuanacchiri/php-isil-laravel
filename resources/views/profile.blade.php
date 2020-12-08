@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_profile{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
    Listado de Pefiles
@endsection
@section('columns_head')
<tr>
    <th>Perfil</th>
    <th>Código</th>
    <th>Actualizado</th>
    <th class="column-options">[]</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
        {"data": "name"},
        {"data": "code"},
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
            $(nRow).find('td:eq(4)').html(htmlTmp);
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
        <label>Nobre*</label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label>Código *</label>
        <input type="text" name="code" class="form-control" required />
    </div>
@endsection