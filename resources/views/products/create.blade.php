@extends('layouts.app')
@section('content')
	{!! Form::open(['route' => 'product/store', 'method' => 'post', 'novalidate']) !!}
		<section class="container">
			<article class="row mt-3">
				<section class="col-lg-6">
					<div class="form-group">
						<label>Producto:</label>
						<input type="text" class="form-control" onkeyup="validateProduct()" name="product" id="product">
						<span class="text-danger font-weight-bold" id="validate_product"></span>
					</div>
					<div class="form-group">
						<label>Lote:</label>
						<input class="form-control" type="text" onkeyup="validateLote()" name="lot_number" id="lot_number">
						<span id="validate_lot" class="text-danger font-weight-bold"></span>
					</div>
					<div class="form-group">
						<label>Fecha de vencimiento:</label>
						<input type="date" name="expirationDate" class="form-control" id="expirationDate" onkeyup="validateExpirationDate()">
						<span class="text-danger font-weight-bold" id="validate_expiration_date"></span>
					</div>
				</section>
				<section class="col-lg-6">
					<div class="form-group">
						<label>Cantidad:</label>
						<input type="text" class="form-control" id="quantity" onkeyup="validateQuantity()" name="quantity">
						<span class="text-danger font-weight-bold" id="validate_quantity"></span>
					</div>
					<div class="form-group">
						<label>Precio:</label>
						<input type="text" name="price" class="form-control" id="price" onkeyup="validatePrice()">
						<span class="text-danger font-weight-bold" id="validate_price"></span>
					</div>
					<div class="form-group">
						<label>Proveedor:</label>
						<select class="form-control" id="provider" onchange="validateProvider()" name="provider">
							<option value="0">Seleccione</option>
							@foreach($providers as $pro)
								<option value="{{ $pro->id }}">{{ $pro->name }}</option>
							@endforeach
						</select>
						<span class="text-danger font-weight-bold" id="validate_provider"></span>
					</div>
				</section>
			</article>
			<article class="row mt-1">
				<section class="col-lg-12">
					<button class="btn btn-success btn-block" hidden="true" id="bottom">Guardar</button>
				</section>
			</article>
		</section>
	{!! Form::close() !!}
{!! HTML::script('js/products/validate.js') !!}
@endsection