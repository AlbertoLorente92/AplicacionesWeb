<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>Aplicaciones Web</title>
<?php 

	session_start();

	$_SESSION["acc"] = $_POST["account"];
	$_SESSION["pass"] = $_POST["password"];

	$_SESSION["account"] = "blas";
	$_SESSION["password"] = "blasblas";
	$_SESSION["bd"] = "mis-usuarios";
	$_SESSION["server"] = "127.0.0.1";

	define("MYSQL_CONN_ERROR", "Unable to connect to database."); 

	// Ensure reporting is setup correctly 
	mysqli_report(MYSQLI_REPORT_STRICT);

	$conected = false;
	
	try{
		$conn = new mysqli($_SESSION["server"], $_SESSION["account"], $_SESSION["password"], $_SESSION["bd"]);

		$sql = "SELECT `nombre`,`psswrd` FROM `mis-usuarios`.`usuarios` WHERE nombre='".  $_SESSION["acc"] ."' && psswrd='". $_SESSION["pass"] ."'";

		$result = $conn->query($sql);
		$row = $result->fetch_row();

		$cuenta = $row[0];
		$contra = (int)($row[1]);

		if($_SESSION["acc"] == $cuenta && $_SESSION["pass"] == $contra){
			$conected = true;
		}

		$conn->close(); 
	} catch(mysqli_sql_exception $e){
		$conected = false;
	}  
	

	if($conected){

		echo '	<div id="admin">
					<a href="admin.php">
						<h1>DATOS CORRECTOS</h1>
						<h1>CONTINUAR</h1>
					</a>
				</div>';
	}else{
		session_destroy();
		echo '	<div id="admin">
					<a href="login.html">
						<h1>DATOS ERRONEOS</h1>
						<h1>VOLVER</h1>
					</a>
				</div>';
	}
 ?>