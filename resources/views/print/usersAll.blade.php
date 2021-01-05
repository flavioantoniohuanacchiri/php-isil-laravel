<style type="text/css">
    * {font-size: 12px; font-family: "Arial"; text-align: center; line-height: 14px;}
    table{width: 100%; display: block; }
    thead { display: table-header-group }
    tfoot { display: table-row-group }
    tr { page-break-inside: avoid }
    h1{font-size: 14px;}
    td.izquierda{text-align: left;}
    td.derecha{text-align: right;}
    th{color: red;}
</style>
<img src="data:image/png;base64,{{\DNS2D::getBarcodePNG('ISIL TE DESEA UNA FELIZ NAVIDAD',  'QRCODE')}}" alt="barcode" />
<h1 style="text-align: center;">Listado de Usuarios</h1>
<table style="border: solid 1px;">
	<thead>
		<tr>
			<th>DNI</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->document_number}}</td>
			<td>{{$user->full_name}}</td>
			<td>{{$user->last_name}}</td>
			<td>{{$user->email}}</td>
		</tr>
		@endforeach
	</tbody>
</table>