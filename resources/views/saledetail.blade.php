@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_business{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Listado de Detalle de Venta
@endsection
@section('columns_head')
<tr>
    <th>Código de Venta</th>
    <th>Producto</th>
    <th>Cantidad</th>
    <th>Precio Unitario</th>
    <th>Total</th>
    <th>Actualizado</th>
    <th class="column-options">[]</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
        {"data": "sale_id"},
        {"data": function ( row, type, val, meta ) {
            let category = "";
            if (row.producthasattribute!=null && row.producthasattribute !="null") {
                return row.producthasattribute.product.name + " - " + row.producthasattribute.attribute.name;
            }
            return "";
        }, name: 'product_has_attribute_id'},
    	{"data": "quantity"},
        {"data": "unit_price"},
        {"data": "total"},
        {"data" : "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Detalle de compra";
    confirmDelete["textMessage"] = "¿Desea Eliminar este Detalle de compra?";
</script>
@endsection
@push("js_master")
<script type="text/javascript">
    /*functionRowTable = function(nRow, aData) {
        if (aData!=null && aData!="null" && aData["status"] !=null && aData["status"] !="null") {
            let htmlTmp = Master.htmlStatus(aData['status']);
            $(nRow).find('td:eq(2)').html(htmlTmp);
        }
    };*/
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
        <a class="btn btn-primary" style="float: right" href="sale" target="_blank"><i class="fas fa-plus"></i></a>
        <label>Código de venta * </label>
        <select class="form-control select2" name="sale_id" data-placeholder="Seleccione un Venta" style="width: 100%;">
            <option value="">Seleccione</option>
            @if(isset($site["sale"]))
                @foreach($site["sale"] as $key => $value)
                <option value="{{$value['id']}}">{{$value['id']}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <a class="btn btn-primary" style="float: right" href="producthasattribute" target="_blank"><i class="fas fa-plus"></i></a>
        <label>Producto * </label>
        <select class="form-control select2" name="product_has_attribute_id" data-placeholder="Seleccione un Producto Attributo" style="width: 100%;">
            <option value="">Seleccione</option>
            @if(isset($site["producthasattribute"]))
                @foreach($site["producthasattribute"] as $key => $value)
                <option value="{{$value['id']}}">{{$value['product']['name']}} - {{$value['attribute']['name']}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label>Cantidad *</label>
        <input type="text" name="quantity" class="form-control" />
    </div>
    <div class="form-group">
        <label>Precio unitario *</label>
        <input type="text" name="unit_price" class="form-control" required />
    </div>
@endsection