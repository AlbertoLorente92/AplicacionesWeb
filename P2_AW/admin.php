<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Aplicaciones Web</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/javascript.js"></script>
</head>
<body>
<div id="admin">
	<p>
		Los usuarios insertados son:
	</p>

	<?php
		$sql = "SELECT `nombre`,`psswrd` FROM `mis-usuarios`.`usuarios`";
		$conn = new mysqli($_SESSION["server"], $_SESSION["account"], $_SESSION["password"], $_SESSION["bd"]);
		$result = $conn->query($sql);
		$nombreCuenta = "nombreCuenta";
		if ($result->num_rows > 0) {
		    echo '<table id="muestrabd">';
		    echo '<tr id="fila1"><td>Nombre</td><td>Password</td></tr>';
		    while($row = $result->fetch_assoc()){
		    	echo "<tr><td class=" . $nombreCuenta . ">" . $row["nombre"]. "</td><td>" . $row["psswrd"]. "</td></tr>";
		    }
		    echo '</table>';
		} else {
		    echo "0 results";
		}
		$conn->close(); 
	?>

	<p>
		Para Borrar uno inserta su nombre:
	</p>

	<form action="borrar.php" method="post">
		<table id="login">
			<tr>
				<td>
					<input type="text" name="nombreborrar" id="nombreborrar">
				</td>
				<td>
					<input type="submit" name="submit" value="Enviar" id="borrarAcc">
				</td>
			</tr>
		</table>
	</form>

	<p>
		Para Modificar uno inserta su nombre:
	</p>

	<form action="modifica.php" method="post">
		<table id="login">
			<tr>
				<td>
					<input type="text" name="nombreMod" id="nombreMod">
				</td>
				<td>
					<input type="submit" name="submit" value="Enviar" id="modificarAcc">
				</td>
			</tr>
		</table>
	</form>

	<p>
		Para Insertar uno nuevo:
	</p>

	<form method="post" action="nuevo.php">
		<table id="login">
			<tr>
				<td>
					<p>
						Account:
					</p>
				</td>
				<td>
					<input type="text" name="account" id="account">
				</td>
			</tr>	
			<tr>
				<td>
					<p>
						Password:
					</p>
				</td>
				<td>
					<input type="password" name="password" id="password">
				</td>
			</tr>	
			<tr>
				<td colspan="2">
					<input type="submit" name="submit" value="Enviar" id="submit">
				</td>
			</tr>	
		</table>
	</form>

	<h1><a href="salir.php"> SALIR </a></h1>
</div>

</body>
</html>