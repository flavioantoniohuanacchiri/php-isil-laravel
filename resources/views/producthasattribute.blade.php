@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_business{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Listado de Producto - Attributo
@endsection
@section('columns_head')
<tr>
    <th>Producto</th>
    <th>Attributo</th>
    <th>Actualizado</th>
    <th class="column-options">[]</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
        {"data": function ( row, type, val, meta ) {
            let product = "";
            if (row.product!=null && row.product !="null") {
                return row.product.name;
            }
            return "";
        }, name: 'product_id'},
        {"data": function ( row, type, val, meta ) {
            let attribute = "";
            if (row.attribute!=null && row.attribute !="null") {
                return row.attribute.name;
            }
            return "";
        }, name: 'attribute_id'},
        {"data" : "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Producto - Atributo";
    confirmDelete["textMessage"] = "¿Desea Eliminar este Producto - Atributo?";
</script>
@endsection
@push("js_master")
<script type="text/javascript">
    functionRowTable = function(nRow, aData) {
        if (aData!=null && aData!="null" && aData["status"] !=null && aData["status"] !="null") {
            let htmlTmp = Master.htmlStatus(aData['status']);
            $(nRow).find('td:eq(2)').html(htmlTmp);
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
        <a class="btn btn-primary" style="float: right" href="product" target="_blank"><i class="fas fa-plus"></i></a>
        <label>Producto * </label>
        <select class="form-control select2" name="product_id" data-placeholder="Seleccione un Estado" style="width: 100%;">
            <option value="">Seleccione</option>
            @if(isset($site["product"]))
                @foreach($site["product"] as $key => $value)
                <option value="{{$value['id']}}">{{$value['name']}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <a class="btn btn-primary" style="float: right" href="attribute" target="_blank"><i class="fas fa-plus"></i></a>
        <label>Atributo * </label>
        <select class="form-control select2" name="attribute_id" data-placeholder="Seleccione un Estado" style="width: 100%;">
            <option value="">Seleccione</option>
            @if(isset($site["attribute"]))
                @foreach($site["attribute"] as $key => $value)
                <option value="{{$value['id']}}">{{$value['name']}}</option>
                @endforeach
            @endif
        </select>
    </div>
@endsection