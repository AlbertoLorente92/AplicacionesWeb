function OnMouse(x){
	string = x.id + "Oculto";
	document.getElementById(string).style.visibility = "visible";
};
function OutMouse(x){
	string = x.id + "Oculto";
	document.getElementById(string).style.visibility = "hidden";
};

function checkText(text){
	var nombre = text.value;
	if(nombre.length==0){
		alert('Campo vacio');
		return;
	}else{
		for(i = 0; i < nombre.length; i++){
			if(nombre.charAt(i) >= "0" && nombre.charAt(i) <= "9"){
				alert('Este campo solo admite letras');
				document.getElementById(text.id).value = "";
				return;
			}
		}
		return;
	}
};

function checkNIF(){
	var NIF = document.getElementById('NIF').value;
	if(NIF.length!=9){
		alert('NIF Incorrecto');
		document.getElementById('NIF').value = "";
		return;
	}else{
		for(i = 0; i < 8; i++){
			if(NIF.charAt(i) < "0" || NIF.charAt(i) > "9"){
				alert('NIF Incorrecto');
				document.getElementById('NIF').value = "";
				return;
			}
		}


		if(NIF.charAt(8) >= "0" && NIF.charAt(8) <= "9"){
			alert('NIF Incorrecto');
			document.getElementById('NIF').value = "";
			return;
		}

		return;
	}
};

function checkNum(num){
	var CP = num.value;
	if(CP.length!=5){
		alert('Son 5 digitos');
		document.getElementById(num.id).value = "";
		return;
	}else{
		for(i = 0; i < 5; i++){
			if(CP.charAt(i) < "0" || CP.charAt(i) > "9"){
				alert('Este campo debe contener solo numeros');
				document.getElementById(num.id).value = "";
				return;
			}
		}

		return;
	}
};

function checkEmail(){
	var email = document.getElementById('email').value;
	if(email.length==0){
		alert('Campo vacio');
		return;
	}else{
		caracNoValidos = "_ / : , ;";
		for(i = 0; i < caracNoValidos.length; i++){
			caracMal = caracNoValidos.charAt(i);
			if(email.indexOf(caracMal,0) > -1){
				alert('Email invalido');
				document.getElementById('email').value = "";
				return;
			}
		}

		posArroba = email.indexOf("@",1);
		if(posArroba==-1){
			alert('Email invalido');
			document.getElementById('email').value = "";
			return;
		}else{
			if(email.indexOf("@",posArroba+1) != -1){
				alert('Email invalido');
				document.getElementById('email').value = "";
				return;
			}else{
				posPunto = email.indexOf(".",posArroba);
				if(posPunto == -1){
					alert('Email invalido');
					document.getElementById('email').value = "";
					return;
				}else{
					if(posPunto+3 > email.length){
						alert('Email invalido');
						document.getElementById('email').value = "";
						return;
					}
					return;
				}
			}
		}
	}
}

var datosNombre;
var datosApellidos;
var datosNIF;
var datosDireccion;
var datosCP;
var datosEmail;
var datosTelefono;

function checkDatos(){
	if(document.getElementById('nombre').value == ""){
		alert('Rellena el campo del nombre');
		return -1;
	}
	if(document.getElementById('apellidos').value == ""){
		alert('Rellena el campo de apellidos');
		return -1;
	} 
	if(document.getElementById('NIF').value == ""){
		alert('Rellena el campo del NIF');
		return -1;
	} 
	if(document.getElementById('direccion').value == ""){
		alert('Rellena el campo del direccion');
		return -1;
	} 
	if(document.getElementById('CP').value == ""){
		alert('Rellena el campo del codigo postal');
		return -1;
	}  
	if(document.getElementById('email').value == "" && document.getElementById('telefono').value == ""){
		alert('Rellena uno de los campos telefono o email');
		return -1;
	} 

	datosNombre = document.getElementById('nombre').value;
	datosApellidos = document.getElementById('apellidos').value;
	datosNIF = document.getElementById('NIF').value;
	datosDireccion = document.getElementById('direccion').value;
	datosCP = document.getElementById('CP').value;
	datosEmail = document.getElementById('email').value;
	datosTelefono = document.getElementById('telefono').value;
	return 0;
}

var numIngredientes = 0;
function checkIngredientes(checkbox){
	if(checkbox.checked){
		if(numIngredientes==3){
			alert('No puedes seleccionar mas de 3 ingredientes');
			checkbox.checked = false;
			return;
		}else{
			numIngredientes++;
			return;
		}
	}else{
		numIngredientes--;
		return;
	}
}

var rebaja = false;
function funCodigo(cod){
	string = cod.value;
	if(string.length!=5){
		alert('Codigo incorrecto');
		cod.value = "";
		return;
	}else{
		contNum = 0;
		contLetras = 0;

		for(i = 0; i < string.length; i++){
			if(string.charAt(i) >= "0" && string.charAt(i) <= "9"){
				contNum++;
			}else{
				contLetras++;
			}
		}

		if(contNum==3 && contLetras==2){
			suma = 0;
			string = string.toUpperCase();
			for(i = 0; i < string.length; i++){
				if(string.charAt(i) >= "0" && string.charAt(i) <= "9"){
					aux = string.charAt(i).charCodeAt(0);
					aux = aux - 48;
					suma = suma + aux;
				}else{
					aux = string.charAt(i).charCodeAt(0);
					aux = (aux - 64)*10;
					suma = suma + aux;
				}
			}

			if(suma==101){				//EE100
				alert('Codigo Correcto');
				rebaja = true;
				calculaPrecio();
				return;
			}else{
				alert('Codigo incorrecto');
				cod.value = "";
				return;
			}
		}else{
			alert('Codigo incorrecto');
			cod.value = "";
			return;
		}
	}
}

function euros(x){
	suma = 0;
	for(i = 0; i < x.length; i++){
		if(x[i].checked){
			aux = x[i].value.charCodeAt(0);
			suma = suma + aux - 48;
		}
	}	
	return suma;
}

function cont(x){
	suma = 0;
	for(i = 0; i < x.length; i++){
		if(x[i].checked){			
			suma++;
		}
	}	
	return suma;
}

function calculaPrecio(){
	var x1 = document.getElementsByName('comida1');
	var x2 = document.getElementsByName('comida2');
	var x3 = document.getElementsByName('comida3');
	var x4 = document.getElementsByName('comida4');

	suma = euros(x1) + euros(x2) + euros(x3) + euros(x4);

	if(rebaja){
		suma = suma *0.75;
		document.getElementById('cantidad').value = suma;
		return;
	}else{
		document.getElementById('cantidad').value = suma;
		return;
	}
}

function pedidoSeleccionado(){
	var x1 = document.getElementsByName('comida1');
	var x2 = document.getElementsByName('comida2');
	var x4 = document.getElementsByName('comida4');
	
	suma = cont(x1) + cont(x2) + cont(x4);

	if(suma == 3)
		return true;
	else
		return false;
}

function checkCompra(){
	if(pedidoSeleccionado()){
		if(checkDatos()==0){
			calculaPrecio();
			alert('Tu comida esta en camino\n prepara ' + document.getElementById('cantidad').value + ' euros')
			return;
		}
	}else{
		alert('Faltan comidas por elegir');
		return;
	}
	return;
}