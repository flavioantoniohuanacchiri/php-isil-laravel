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
    <th>Nombre</th>
    <th>Tipo</th>
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
        {"data": function ( row, type, val, meta ) {
            let atributotipo = "";
            if (row.atributotipo!=null && row.atributotipo !="null") {
                return row.atributotipo.nombre;
            }
            return atributotipo;
        }, name: 'atributotipo_id'},
        {"data": "estado"},
        {"data" : "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Atributo";
    confirmDelete["textMessage"] = "¿Desea Eliminar este Atributo?";
</script>
@endsection
@push("js_master")
<script type="text/javascript">
    functionRowTable = function(nRow, aData) {
        if (aData!=null && aData!="null" && aData["estado"] !=null && aData["estado"] !="null") {
            let htmlTmp = Master.htmlStatus(aData['estado']);
            $(nRow).find('td:eq(3)').html(htmlTmp);
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
        <label>Tipo</label>
        <select name="atributotipo_id" class="form-control select2" data-placeholder="Seleccione un Tipo" style="width: 100%;">
            <option value="">Seleccione</option>
            @if(isset($site["atributotipo"]))
            	@foreach($site["atributotipo"] as $key => $value)
            	<option value="{{$value['id']}}">{{$value['nombre']}}</option>
            	@endforeach
            @endif
        </select>
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