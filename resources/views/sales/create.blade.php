@extends('layouts.app')
@section('content')
	<section class="container">
		<article class="row mt-3">
			<section class="col-lg-6">
				<div class="form-group">
					<label>Precio total:</label>
					<h6>$<a class="total_price">0</a></h6>
					<input type="hidden" name="total_price" class="total_price">
				</div>
				<div class="form-group border bg-info text-white border-dark">
					<h6 class="mt-2 text-center">Instrucciones:</h6>
					<p class="px-3">
						-Para seleccionar el producto debe de dar clic en "Ver inventario", digitar la cantidad que va a comprar y dar clic en "Seleccionar"
						-Para quitar productos de la cesta de compra debe dar clic en "Quitar"
						-Para generar factura debe primero seleccionar los productos
					</p>
				</div>
				<div class="mt-5 border text-center card" id="sale" hidden="true">
					<div class="card-header">
						<h4 class="mt-2 border-bottom">Productos a comprar</h4>
					</div>
					<div class="card-body" id="cardBodySale">
						
					</div>
					<div class="card-footer">
						<a class="btn btn-success text-white" onclick="generatePdf()">Generar factura</a>
					</div>
				</div>
			</section>
			<section class="col-lg-6 text-center">
				<a class="btn btn-info text-white" onclick="seeInventory()" id="seeInventoryId">Ver inventario</a>
				<div class="border mt-3 card" hidden="false" id="inventory">
					<div class="card-header">
						<h4 class="mt-2 border-bottom">Inventario</h4>
					</div>
					<div class="card-body" id="cardBodyInventory">
						<label>Cantidad</label>
						<input type="number" min="1" class="form-control mb-3" id="quantity">
						<span class="text-danger font-weight-bold" id="validate_quantity"></span>
					</div>
				</div>
			</section>
		</article>
	</section>
{!! HTML::script('js/sales/sale.js') !!}
@endsection