window.onload = function functionOnload()
{
	validateFields()
}

function validateLote()
{
	let valueLote = document.getElementById('lot_number').value
	let valueValidate = document.getElementById('validate_lot')
	//Validación de número
	if(valueLote.length > 11)
		valueValidate.innerHTML = 'Este campo debe ser menor a 11 números'
	else if(valueLote.length > 3)
	{
		valueValidate.innerHTML = ''
		let numberLot = Math.sign(valueLote)
		switch(numberLot)
		{
			case 0:
				valueValidate.innerHTML = 'Este campo debe ser un número mayor a 0'
				break;
			case -0:
				valueValidate.innerHTML = 'Este campo debe ser un número mayor a 0'
				break;
			case -1: 
				valueValidate.innerHTML = 'Este campo debe ser un número positivo'
				break;
			case 1: 
				valueValidate.innerHTML = ''
				break;
			default :
				valueValidate.innerHTML = 'Este campo debe llenado con solo números'
				break;
		}
	}else
		valueValidate.innerHTML = 'El campo de Lote es obligatorio, verifique que su longitud sea más de 3 números'

	validateBottom()
}

function validateProduct()
{
	let valueProduct = document.getElementById('product').value
	let valueValidate = document.getElementById('validate_product')
	//Validación de caracteres
	if(valueProduct.length > 255)
		valueValidate.innerHTML = 'Este campo debe ser menor a 255 caracteres'
	else if(valueProduct.length >= 2)
		valueValidate.innerHTML = ''
	else
		valueValidate.innerHTML = 'Este campo es obligatorio'

	validateBottom()
}

function validateExpirationDate()
{
	let valueExpirationDate = document.getElementById('expirationDate').value
	let valueValidate = document.getElementById('validate_expiration_date')
	
	if (valueExpirationDate == '')
		valueValidate.innerHTML = 'Este campo es obligatorio'
	else
		valueValidate.innerHTML = ''

	validateBottom()
}

function validateQuantity()
{
	let valueQuantity = document.getElementById('quantity').value
	let valueValidate = document.getElementById('validate_quantity')

	if(valueQuantity.length > 11)
		valueValidate.innerHTML = 'El campo no debe ser mayor a 11 números'
	else if(valueQuantity.length > 0)
	{
		let valueNumber = Math.sign(valueQuantity)
		switch(valueNumber)
		{
			case 0: 
				valueValidate.innerHTML = 'Este campo debe ser mayor a 0'
				break;
			case 1: 
				valueValidate.innerHTML = ''
				break;
			case -1:
				valueValidate.innerHTML = 'Este campo es llenado por números positivos'
				break;
			default:
				valueValidate.innerHTML = 'El campo debe ser llenado con solo números'
				break;
		}
	}
	else
		valueValidate.innerHTML = 'Este campo es obligatorio'

	validateBottom()
}

function validatePrice()
{
	let valuePrice = document.getElementById('price').value
	let valueValidate = document.getElementById('validate_price')

	if(valuePrice.length >= 3)
	{
		if(valuePrice % 1 != 0)
			valueValidate.innerHTML = ''
		else
			valueValidate.innerHTML = 'El número deigitado debe ser décimal'
	}else
		valueValidate.innerHTML = 'Este campo es obligatorio'

	validateBottom()
}

function validateProvider()
{
	let valueProvider = document.getElementById('provider').value
	let valueValidate = document.getElementById('validate_provider')

	if(valueProvider != 0)
		valueValidate.innerHTML = ''
	else
		valueValidate.innerHTML = 'Este campo es obligatorio'

	validateBottom()
}

function validateBottom()
{
	let bottom = document.getElementById('bottom')
	//btner valor de Validaciones
	let valueValidateProduct = document.getElementById('validate_product').innerHTML
	let valueValidateLot = document.getElementById('validate_lot').innerHTML
	let valueValidateExpirationDate = document.getElementById('validate_expiration_date').innerHTML
	let valueValidateQuantity = document.getElementById('validate_quantity').innerHTML
	let valueValidatePrice = document.getElementById('validate_price').innerHTML
	let valueValidateProvider = document.getElementById('validate_provider').innerHTML

	if(valueValidateProduct == '' && valueValidateLot == '' && valueValidateExpirationDate == '' && valueValidateQuantity == '' && valueValidatePrice == '' && valueValidateProvider == '')
		bottom.removeAttribute('hidden')
	else
		bottom.setAttribute('hidden', 'true')
}

function validateFields()
{
	let message = 'El campo es obligatorio'
	document.getElementById('validate_product').innerHTML = message
	document.getElementById('validate_lot').innerHTML = message
	document.getElementById('validate_expiration_date').innerHTML = message
	document.getElementById('validate_quantity').innerHTML = message
	document.getElementById('validate_price').innerHTML = message
	document.getElementById('validate_provider').innerHTML = message
}