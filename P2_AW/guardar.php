<title>Aplicaciones Web</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
	session_start();

	$cuenta = $_SESSION["n"];
	$pass = $_POST["passwordMod"];

	if(!is_numeric($pass)){
		echo '	<div id="admin">
				<a href="admin.php">
					<h1>La password debe ser numerica</h1>
					<h1>VOLVER</h1>
				</a>
			</div>';
	}else{
	
		$conn = new mysqli($_SESSION["server"], $_SESSION["account"], $_SESSION["password"], $_SESSION["bd"]);

		$sql = "UPDATE `mis-usuarios`.`usuarios` set psswrd='". $pass."' WHERE nombre='". $cuenta ."'";
		$conn->query($sql);
		$conn->close(); 

		echo '	<div id="admin">
					<a href="admin.php">
						<h1>Usuario modificado</h1>
						<h1>VOLVER</h1>
					</a>
				</div>';
	}
	
?>