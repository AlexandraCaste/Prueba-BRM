function seeInventory ()
{
	$.ajax({
		type: 'get',
		url: 'product/show'
	}).then(response => {
		document.getElementById('seeInventoryId').setAttribute('hidden', 'true')
		document.getElementById('inventory').removeAttribute('hidden')
		for(i = 0; i < response.length; i++){
			data = response[i]
			$('<li class="list-group-item">'
				+'  <h6> Producto: '+response[i].name+' </h6>'
				+'  <h6> Cantidad: '+response[i].quantity+'</h6>'
				+'  <h6> Número de lote: '+response[i].lot_number+'</h6>'
				+'  <h6> Fecha de vencimiento: '+response[i].expiration_date+'</h6>'
				+'  <h6> Precio: '+response[i].price+'</h6>'
				+'	<a class="btn btn-success btn-sm text-white" onclick="selectProduct(data)">Seleccionar</a>'
			+'</li>').appendTo('#cardBodyInventory')
		}
	}).catch(error => {
		console.log(error)
	});
}

function selectProduct(response)
{
	let valueQuantity = document.getElementById('quantity').value
	let validateQuantity = document.getElementById('validate_quantity')

	if(valueQuantity != '' && valueQuantity <= quantity)
	{
		document.getElementById('sale').removeAttribute('hidden')
		validateQuantity.innerHTML = ''
		$("<li> Producto: </li>").appendTo('#cardBodySale')
		addTotalPrice(response, valueQuantity)
	}else
		validateQuantity.innerHTML = 'El campo de cantidad debe ser digitada, verifique que la cantidad digitada sea menor que la'
		+' cantidad que tiene el producto'
}

function addTotalPrice(response, quantity)
{
	console.log(response, quantity)
	let total_price = document.getElementById('total_price').innerHTML
	if (total_price == 0)
		document.getElementById('total_price').innerHTML = ''
	else{
		let valor = response.price * quantity
		let suma = Number.parseFloat(total_price) + Number(response.price)
		document.getElementById('total_price').innerHTML = suma
	}
}