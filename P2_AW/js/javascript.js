var accOk = false;
var passOk = false;

function checkSubmit(){
	if(accOk && passOk){
		document.getElementById('submit').disabled = false;
	} else {
		document.getElementById('submit').disabled = true;
	}
}

function checkAcc(elem){
	var email = document.getElementById(elem.id).value;
	if(email.length<=0){
		document.getElementById(elem.id).style.borderStyle = "solid";
		document.getElementById(elem.id).style.borderColor = "red";
		accOk = false;
		checkSubmit();
		return;
	}else{
		for(i = 0; i < email.length; i++){
			if(email.charAt(i) >= "0" && email.charAt(i) <= "9"){
				alert('Este campo solo admite letras');
				document.getElementById(elem.id).value = "";
				document.getElementById(elem.id).style.borderStyle = "solid";
				document.getElementById(elem.id).style.borderColor = "red";
				accOk = false;
				checkSubmit();
				return;
			}
		}

		accOk = true;
		document.getElementById(elem.id).style.borderStyle = "";
		document.getElementById(elem.id).style.borderColor = "";
		checkSubmit();
		return;
	}
}

function checkPass(elem){
	var email = document.getElementById(elem.id).value;
	if(email.length<=0){
		document.getElementById(elem.id).style.borderStyle = "solid";
		document.getElementById(elem.id).style.borderColor = "red";
		passOk = false;
		checkSubmit();
		return;
	}else{
		for(i = 0; i < email.length; i++){
			if(email.charAt(i) < "0" || email.charAt(i) > "9"){
				alert('Este campo solo admite numeros');
				document.getElementById(elem.id).value = "";
				document.getElementById(elem.id).style.borderStyle = "solid";
				document.getElementById(elem.id).style.borderColor = "red";
				passOk = false;
				checkSubmit();
				return;
			}
		}

		document.getElementById(elem.id).style.borderStyle = "";
		document.getElementById(elem.id).style.borderColor = "";
		passOk = true;
		checkSubmit();
		return;
	}
}