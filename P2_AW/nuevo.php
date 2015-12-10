<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>Aplicaciones Web</title>
<?php 

	session_start();

	$a = $_POST["account"];
	$p = $_POST["password"];

	if(empty($a) || empty($p)){
		echo '	<div id="admin">
					<a href="admin.php">
						<h1>CAMPOS VACIOS</h1>
						<h1>VOLVER</h1>
					</a>
				</div>';
	}else{
		if(is_numeric($a)){
			echo '	<div id="admin">
						<a href="admin.php">
							<h1>La cuenta no debe ser numerica</h1>
							<h1>VOLVER</h1>
						</a>
					</div>';
		}else{
			if(!is_numeric($p)){
				echo '	<div id="admin">
							<a href="admin.php">
								<h1>La password debe ser numerica</h1>
								<h1>VOLVER</h1>
							</a>
						</div>';
			}else{
				define("MYSQL_CONN_ERROR", "Unable to connect to database."); 

				// Ensure reporting is setup correctly 
				mysqli_report(MYSQLI_REPORT_STRICT);

				$conected = false;
				$YaInsertado =  false;
				
				try{
					$conn = new mysqli($_SESSION["server"], $_SESSION["account"], $_SESSION["password"], $_SESSION["bd"]);
					$conected = true;
					$sql = "SELECT `nombre` FROM `mis-usuarios`.`usuarios` WHERE nombre='".  $a ."'";

					$result = $conn->query($sql);
					$row = $result->fetch_row();

					$cuenta = $row[0];

					if($a == $cuenta){
						$YaInsertado = true;
					}

					$conn->close(); 
				} catch(mysqli_sql_exception $e){
					$conected = false;
				}  
				
				if($conected){
					if(!$YaInsertado){
						$sql = "INSERT INTO `mis-usuarios`.`usuarios` (`nombre`, `psswrd`) VALUES ('". $a. "', '" .$p ."')";
						$conn = new mysqli($_SESSION["server"], $_SESSION["account"], $_SESSION["password"], $_SESSION["bd"]);
						$conn->query($sql);
						$conn->close();
						echo '	<div id="admin">
									<a href="admin.php">
										<h1>DATOS INSERTADOS</h1>
										<h1>CONTINUAR</h1>
									</a>
								</div>';
					}else{
						echo '	<div id="admin">
									<a href="admin.php">
										<h1>Usuario previamente insertado</h1>
										<h1>CONTINUAR</h1>
									</a>
								</div>';
					}
				}else{
					echo '	<div id="admin">
								<a href="admin.php">
									<h1>DATOS ERRONEOS</h1>
									<h1>VOLVER</h1>
								</a>
							</div>';
				}
			}
		}
	}
 ?>