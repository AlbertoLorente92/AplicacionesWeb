<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>Aplicaciones Web</title>
<?php 

	session_start();

	$nombreBD = $_POST["nombreborrar"];

	if(empty($nombreBD)){
		echo '	<div id="admin">
					<a href="admin.php">
						<h1>CAMPOS VACIOS</h1>
						<h1>VOLVER</h1>
					</a>
				</div>';
	}else{

		define("MYSQL_CONN_ERROR", "Unable to connect to database."); 

		// Ensure reporting is setup correctly 
		mysqli_report(MYSQLI_REPORT_STRICT);

		$conected = false;
		$conn;

		try{
			$conn = new mysqli($_SESSION["server"], $_SESSION["account"], $_SESSION["password"], $_SESSION["bd"]);
			$conected = true;
		} catch(mysqli_sql_exception $e){
			$conected = false;
		}  

		if($conected){
			$sql = "SELECT `nombre`,`psswrd` FROM `mis-usuarios`.`usuarios` WHERE nombre='".  $nombreBD ."'";
			$result = $conn->query($sql);
			$nom = ($result->fetch_row()[0]);
			if(!empty($nombreBD) && $nom == $nombreBD){
				$sql = "DELETE FROM `mis-usuarios`.`usuarios` WHERE nombre='".  $nombreBD ."'";
				$conn->query($sql);
				echo '	<div id="admin">
							<a href="admin.php">
								<h1>USUARIO BORRADO</h1>
							</a>
						</div>';
				$conn->close();
			}else{
				echo '	<div id="admin">
							<a href=admin.php>
								<h1>No existe el usuario</h1>
								<h1>VOLVER</h1>
							</a>
						</div>';
				$conn->close();
			}
		}else{
			$conn->close();
			echo '	<div id="admin">
						<a href=admin.php>
							<h1>DATOS ERRONEOS</h1>
							<h1>VOLVER</h1>
						</a>
					</div>';
		}
	}
 ?>