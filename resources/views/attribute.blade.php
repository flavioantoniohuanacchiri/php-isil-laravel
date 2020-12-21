@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_business{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Listado de Atributos
@endsection
@section('columns_head')
<tr>
    <th>Código</th> 
    <th>Atributo</th> 
    <th>Tipo de Atributo</th> 
    <th>Estado</th>
    <th>Actualizado</th>
    <th class="column-options">Acción</th>
</tr>
@endsection
@section("script_master")     
<script type="text/javascript">
    columnsTable = [
        {"data": "code"},
        {"data": "name"},
        //{"data": "attribute_type_id"},
        {"data": function ( row, type, val, meta ) 
            {
                let attribute_type = "";
                if (row.attribute_type!=null && row.attribute_type !="null") 
                {
                    return row.attribute_type.name;
                }
            return "";
            },
            name: "attribute_type_id"},
        {"data": "status"},
        {"data": "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Atributo";
    confirmDelete["textMessage"] = "¿Desea Eliminar este Atributo?";
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
        <label>Código *</label>
        <input type="text" name="code" class="form-control solo-enteros" minlength="5" maxlength="5" required/>
    </div>
    <div class="form-group">
        <label>Atributo *</label>
        <input type="text" name="name" class="form-control" required/>
    </div> 
    <div class="form-group">
        <label>Tipo de Atributo * </label>
        <select class="form-control select2" name="attribute_type_id" data-placeholder="Seleccione un Tipo de Atributo" style="width: 100%;">
            <option value="">Seleccione</option>
            @if(isset($site["attribute_type"]))
                @foreach($site["attribute_type"] as $key => $value)
                <option value="{{$value['id']}}">{{$value['name']}}</option>
                @endforeach
            @endif
        </select>
    </div>    
    <div class="form-group">
        <label>Estado *</label>
        <select class="form-control select2" name="status" data-placeholder="Seleccione un Estado" style="width: 100%;">
            <option value="">Seleccione</option>
            <option value="1" selected>Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
@endsection