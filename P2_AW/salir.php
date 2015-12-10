<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>Aplicaciones Web</title>
<?php 

	session_start();

	session_destroy();

	echo '	<div id="admin">
				<a href="login.html">
					<h1>VOLVER</h1>
				</a>
			</div>';

 ?>