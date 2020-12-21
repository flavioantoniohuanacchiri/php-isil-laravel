@extends('layouts.page')
@push("css")
<style type="text/css">
    #belongs_business{
        margin-right: 15px;
    }
</style>
@endpush
@section('title_list')
	Venta
@endsection
@section('columns_head')
<tr>
    <th>Cliente</th>
    <th>Fecha de compra</th>
    <th>Total S/</th>
    <th>Actualizado</th>
    <th class="column-options">Acción</th>
</tr>
@endsection
@section("script_master")
<script type="text/javascript">
    columnsTable = [
        {"data": function ( row, type, val, meta ) 
            {
                let customer = "";
                if (row.customer!=null && row.customer !="null") 
                {
                    return row.customer.name;
                }
            return "";
            },
            name: 'customer_id'},
    	{"data": "created_at"},
        {"data": "total"},
        {"data": "updated_at"},
        {"data": 'action', name: 'action', orderable: false, searchable: false}
    ];
    confirmDelete["titleMessage"] = "Eliminación de Compra";
    confirmDelete["textMessage"] = "¿Desea Eliminar esta Compra?";
</script>
@endsection
@push("js_master")
<script type="text/javascript">
    functionRowTable = function(nRow, aData) {
        if (aData!=null && aData!="null" && aData["status"] !=null && aData["status"] !="null") {
            let htmlTmp = Master.htmlStatus(aData['status']);
            $(nRow).find('td:eq(7)').html(htmlTmp);
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
        <label>Cliente * </label>
        <select name="customer_id" class="form-control select2" data-placeholder="Seleccione un Cliente" style="width: 100%;">
            <option value="">Seleccione</option>
            @if(isset($site["customer"]))
                @foreach($site["customer"] as $key => $value)
                <option value="{{$value['id']}}">{{$value['name']}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label>Producto * </label>
        <select name="product_id" class="form-control select2" data-placeholder="Seleccione un Producto" style="width: 100%;">
            <option value="">Seleccione</option>
            @if(isset($site["product"]))
                @foreach($site["product"] as $key => $value)
                <option value="{{$value['id']}}">{{$value['name']}}</option>
                @endforeach
            @endif
        </select>
    </div>


@endsection