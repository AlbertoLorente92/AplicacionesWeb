<title>Aplicaciones Web</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
	session_start();

	$cuenta = $_POST["nombreMod"];

	if(empty($cuenta)){
		echo '	<div id="admin">
					<a href="admin.php">
						<h1>CAMPOS VACIOS</h1>
						<h1>VOLVER</h1>
					</a>
				</div>';
	}else{

		$_SESSION["n"] = $_POST["nombreMod"];
		$conn = new mysqli($_SESSION["server"], $_SESSION["account"], $_SESSION["password"], $_SESSION["bd"]);

		$sql = "SELECT `nombre`,`psswrd` FROM `mis-usuarios`.`usuarios` WHERE nombre='".  $_POST["nombreMod"] ."'";

		$result = $conn->query($sql);
		$row = $result->fetch_row();
		$conn->close(); 
		if(!empty($cuenta) && $row[0] == $cuenta){
			echo '
				<form action="guardar.php" method="post">
					<table id="login">
						<tr>
							<td>
								Nombre:
							</td>
							<td>
								<input type="text" disabled name="nombreMod" id="nombreMod2" value="'.$row[0].'">
							</td>
						</tr>
						<tr>
							<td>
								Password:
							</td>
							<td>
								<input type="text" name="passwordMod" id="passwordMod" value="'.$row[1].'">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="submit" value="Enviar" id="borrarlogin">
							</td>
						</tr>
					</table>
				</form>
			';
		}else{
			echo '	<div id="admin">
						<a href="admin.php">
							<h1>El usuario insertado no existe</h1>
							<h1>VOLVER</h1>
						</a>
					</div>';
		}
	}
?>