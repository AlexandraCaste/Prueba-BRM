var listProductSelect = []

//función para ver el inventario
function seeInventory ()
{
	$.ajax({
		type: 'get',
		url: 'product/show'
	}).then(response => {
		if($('.elementsInventory'))
			$('.elementsInventory').remove()
		document.getElementById('seeInventoryId').setAttribute('hidden', 'true')
		document.getElementById('inventory').removeAttribute('hidden')
		for(i = 0; i < response.length; i++){
			let name = response[i].name
			let quantity = response[i].quantity
			let lot_number = response[i].lot_number
			let expiration_date = response[i].expiration_date
			let price = response[i].price
			let id = response[i].id
			$('<li class="list-group-item elementsInventory">'
				+'  <h6> Producto: '+name+' </h6>'
				+'  <h6> Cantidad: '+quantity+'</h6>'
				+'  <h6> Número de lote: '+lot_number+'</h6>'
				+'  <h6> Fecha de vencimiento: '+expiration_date+'</h6>'
				+'  <h6> Precio: '+price+'</h6>'
				+'	<a class="btn btn-success btn-sm text-white" onclick="selectProduct(\''+name+'\', '+quantity+', '+lot_number+', \''+expiration_date
				+'\', '+price+', '+id+')">Seleccionar</a>'
			+'</li>').appendTo('#cardBodyInventory')
		}
	}).catch(error => {
		console.log(error)
	});
}

//Función para selecionar producto
function selectProduct(name, quantity, lot_number, expiration_date, price, id)
{
	let valueQuantity = document.getElementById('quantity').value
	let data = [{'id': id, 'name': name, 'quantity': quantity, 'lot_number': lot_number, 'expiration_date': expiration_date, 'price': price, 'valueQuantity': valueQuantity}]
	let validateQuantity = document.getElementById('validate_quantity')

	if(valueQuantity != '' && valueQuantity <= quantity && valueQuantity != 0)
	{
		listProductSelect.push(data)
		document.getElementById('sale').removeAttribute('hidden')
		validateQuantity.innerHTML = ''
		$('<li class="list-group-item" id="productSale'+id+'">'
		 	+'	<h6> Producto: '+data[0].name+'</h6>'
		 	+'	<h6> Cantidad selecionada: '+valueQuantity+'</h6>'
		 	+'	<h6> Número de lote: '+data[0].lot_number+'</h6>'
		 	+'	<h6> Fecha de vencimiento: '+data[0].expiration_date+'</h6>'
		 	+'	<h6> Precio: '+parseFloat(data[0].price).toFixed(3)+'</h6>'
		 	+'	<a class="btn btn-danger btn-sm text-white" onclick="diselectProduct('+id+', '+valueQuantity+', '+price+')">Quitar</a>'
		+'</li>').appendTo('#cardBodySale')

		//Precio total
		addTotalPrice(data, valueQuantity)
		restQuantityProduct(data, valueQuantity)
	}else
		validateQuantity.innerHTML = 'El campo de cantidad debe ser digitada, verifique que la cantidad digitada sea menor que la'
		+' cantidad que tiene el producto'
}

//Función para deseleccionar producto
function diselectProduct(id, valueQuantity, price)
{
	for(i = 0; i < listProductSelect.length; i++){
		if(listProductSelect[i][0].id == id){
			let sliceI = listProductSelect.indexOf(i)
			listProductSelect.splice(sliceI, 1)
		}
	}
	console.log(listProductSelect)
	$('#productSale'+id).remove()
	addQuantityProduct(id, valueQuantity)
	restTotalPrice(price, valueQuantity)
	if($('#cardBodySale')[0].firstChild == null)
		document.getElementById('sale').setAttribute('hidden', true)
}

//Sumar precio total
function addTotalPrice(data, quantity)
{
	let total_price = document.getElementsByClassName('total_price')[0].innerHTML
	let valor = Number.parseFloat(data[0].price).toFixed(3) * Number.parseInt(quantity)
	let	suma = parseFloat(valor) + parseFloat(total_price)
	suma = Number(suma).toFixed(3)
	document.getElementsByClassName('total_price')[0].innerHTML = suma
}

//Restar precio total
function restTotalPrice(price, valueQuantity)
{
	let total_price = document.getElementsByClassName('total_price')[0].innerHTML
	let valor = Number.parseFloat(price).toFixed(3) * Number.parseInt(valueQuantity)
	let	resta = parseFloat(total_price) - parseFloat(valor)
	resta = Number(resta).toFixed(3)
	document.getElementsByClassName('total_price')[0].innerHTML = resta
}

//Función de restar cantidad al producto
function restQuantityProduct(data, quantity)
{
	$.ajax({
		type: 'get',
		url: 'product/restQuantity/'+data[0].id+'/'+quantity,
	}).then(response => {
		seeInventory()
	}).catch(error => {
		console.log(error)
	});
}

//Función de sumar cantidad al producto
function addQuantityProduct(id, valueQuantity)
{
	$.ajax({
		type: 'get',
		url: 'product/addQuantity/'+id+'/'+valueQuantity
	}).then(response => {
		seeInventory()
	}).catch(error => {
		console.log(error)
	});
}

//Función de generar pdf
function generatePdf()
{
	let total_price = document.getElementsByClassName('total_price')[0].innerHTML
	window.location.href = 'sale/pdf/'+total_price+'/'+JSON.stringify(listProductSelect)
}