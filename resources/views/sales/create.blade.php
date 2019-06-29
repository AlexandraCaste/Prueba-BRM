@extends('layouts.app')
@section('content')
	<section class="container">
		<article class="row mt-3">
			<section class="col-lg-6">
				<div class="form-group">
					<label>Precio total:</label>
					<input disabled="" id="price_total">
				</div>
				<div class="form-group border bg-info text-white border-dark">
					<h6 class="mt-2 text-center">Instrucciones:</h6>
					<p class="px-3">
						-Para seleccionar el producto debe de dar clic en "Ver inventario", digitar la cantidad que va a comprar y dar clic en "Seleccionar"
						-Para quitar productos de la cesta de compra debe dar clic en "Quitar"
						-Para generar factura debe primero seleccionar los productos
					</p>
				</div>
				<div class="mt-5 border text-center">
					<h4 class="mt-2 border-bottom">Productos a comprar</h4>

				</div>
			</section>
			<section class="col-lg-6 text-center">
				<a class="btn btn-info text-white" onclick="seeInverntory()">Ver inventario</a>
				<a class="btn btn-success text-white">Generar factura</a>
				<a class="btn btn-danger text-white">Cancelar compra</a>
				<div class="border mt-3" hidden="false" id="inverntory">
					<h4 class="mt-2 border-bottom">Inventario</h4>
					<label>Cantidad</label>
					<input type="number" min="1" class="form-control mb-3" id="quantity">
					<span class="text-danger font-weight-bold" id="validate_quantity"></span>
				</div>
			</section>
		</article>
		<article class="row d-flex justify-content-end text-center" hidden="false">
			<section class="col-lg-6">
				<button class="btn btn-success text-white mt-3">Comprar</button>
			</section>
		</article>
	</section>
{!! HTML::script('js/sales/sale.js') !!}
@endsection