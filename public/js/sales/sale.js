function seeInverntory ()
{
	$.ajax({
		type: 'get',
		url: 'product/show'
	}).then(response => {
		document.getElementById('inverntory').removeAttribute('hidden')
		for(let i = 0; i < response.length; i++)
		{
			let li = $("<li>Producto: "+response[i]['name']+", Cantidad: "+response[i]['quantity']+", Precio: "+response[i]['price']+"</li>"
				+"<a class='btn btn-success btn-sm text-white mb-2' onclick='selectProduct("+response[i]['id']+", "+response[i]['quantity']+", \""+response[i]['name']+"\", \""+response[i]['price']+"\")'>Seleccionar</a>").appendTo('#inverntory')

		}
	}).catch(error => {
		console.log(error)
	});
}

var suma = 0
function selectProduct(id, quantity, name, price)
{
	let valueQuantity = document.getElementById('quantity').value
	let validateQuantity = document.getElementById('validate_quantity')

	if(valueQuantity != '' && valueQuantity < quantity)
	{
		validateQuantity.innerHTML = ''
		$("<li> Producto: </li>")

		suma = Number.parseFloat(suma).toFixed(3) + Number.parseFloat(price).toFixed(3)
		$('#price_total').val(suma)
		console.log($('#price_total'))

	}else
		validateQuantity.innerHTML = 'El campo de cantidad debe ser digitada, verifique que la cantidad digitada sea menor que la cantidad que tiene el producto'
}

function sumaTotalPrice(price)
{
}