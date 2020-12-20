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
    <th>Empresa</th>
    <th>Contacto</th>
    <th>RUC</th>
    <th>Email</th>
    <th>Estado</th>
    <th>Actualizado</th>
    <th class="column-options">[]</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
    	{"data": "empresa"},
        {"data": "contacto"},
        {"data": "document_number"},
        {"data": "email"},
        {"data": "status"},       
        {"data" : "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Proveedor";
    confirmDelete["textMessage"] = "¿Desea Eliminar este Proveedor?";
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
  
</script>
@endpush
@section("content_form_modal")
       
    <div class="form-group">
        <label>Empresa *</label>
        <input type="text" name="empresa" class="form-control" />
    </div>
    <div class="form-group">
        <label>Contacto *</label>
        <input type="text" name="contacto" class="form-control" required />
    </div>
    <div class="form-group">
        <label>RUC *</label>
        <input type="text" name="document_number" class="form-control solo-enteros" required />
    </div>
    <div class="form-group">
        <label>Email *</label>
        <input type="text" name="email" class="form-control" />
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