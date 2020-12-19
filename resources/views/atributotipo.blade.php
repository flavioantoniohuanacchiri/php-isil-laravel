@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_business{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Listado de Tipo de Atributos
@endsection
@section('columns_head')
<tr>
    <th>Código</th>
    <th>Nombre</th>
    <th>Estado</th>
    <th>Actualizado</th>
    <th class="column-options">[]</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
        {"data": "codigo"},
    	{"data": "nombre"},
        {"data": "estado"},
        {"data" : "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Tipo de Atributos";
    confirmDelete["textMessage"] = "¿Desea Eliminar este Tipo de Atributos?";
</script>
@endsection
@push("js_master")
<script type="text/javascript">
    functionRowTable = function(nRow, aData) {
        if (aData!=null && aData!="null" && aData["estado"] !=null && aData["estado"] !="null") {
            let htmlTmp = Master.htmlStatus(aData['estado']);
            $(nRow).find('td:eq(2)').html(htmlTmp);
        }
    };

</script>
@endpush
@section("content_form_modal")
    <div class="form-group">
        <label>Código *</label>
        <input type="text" name="codigo" class="form-control" />
    </div>
    <div class="form-group">
        <label>Nombre *</label>
        <input type="text" name="nombre" class="form-control" />
    </div>
    <div class="form-group">
        <label>Estado *</label>
        <select class="form-control select2" name="estado" data-placeholder="Seleccione un Estado" style="width: 100%;">
            <option value="">Seleccione</option>
            <option value="1">ACTIVO</option>
            <option value="0">INACTIVO</option>
        </select>
    </div>
@endsection