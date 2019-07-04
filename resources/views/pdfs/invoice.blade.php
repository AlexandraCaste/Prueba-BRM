<!DOCTYPE html>
<html>
	<head>
		<title>Factura</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	</head>
	<table>
		<thead>
			<tr>
				<div><h4 class="text-center">Facturación de Prueba BRM</h4></div>
			</tr>
		</thead>
	</table>
	<table class="mt-3">
		<thead>
			<tr>
				<div><h6 class="mt-3">Precio total: ${{ $total_price }}</h6></div>
			</tr>
		</thead>
	</table>
	<table class="mt-5">
		<thead>
			<tr>
				<div><h5 class="mt-3 text-center">Productos</h5></div>
			</tr>
		</thead>
	</table>
	<table class="table mt-2 table-bordered border-dark">
		<thead>
			<tr class="text-center">
				<th>Producto</th>
				<th>Precio unitario</th>
				<th>Cantidad solicitada</th>
				<th>Número de lote</th>
				<th>Fecha de vencimiento</th>
			</tr>
		</thead>
		<tbody>
			{{ var_dump($products) }}
			@foreach($products as $product)
				<tr class="text-center">
					<td>{{ $product[0]->name }}</td>
					<td>{{ number_format($product[0]->price, 3) }}</td>
					<td>{{ $product[0]->valueQuantity }}</td>
					<td>{{ $product[0]->lot_number }}</td>
					<td>{{ $product[0]->expiration_date }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</html>