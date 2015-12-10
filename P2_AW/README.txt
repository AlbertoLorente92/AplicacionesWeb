PRÁCTICA APLICAIONES WEB - INSTRUCCIONES DE USO / INSTALACION
=============================================================

Está práctica se ejecuta sobre XAMPP. Levantando el servicio Apache y MySQL.

Una vez descargada la práctica es necesario descomprimirla dentro de /xampp/htdocs/ para poder ejecutarla en localhost.

Antes de poder trabajar con ella es necesario crear la base de datos. Para ello puede importarse el fichero SQL guardado en la carpeta descomprimida.

	Importar Base de datos:

		1. - Escribimos localhost en el navegador.
		2. - Seleccionamos phpMyAdmin
		3. - Le damos a "Importar"
		4. - Pulsamos "Seleccionar Archivo" y navegamos hasta la carpeta descomprimida en /xampp/htdocs/ donde seleccionamos el archivo "mis-usuarios.sql"
		5. - Le damos a continuar y empezará a cargarla
		6. - Si todo sale bien saldrá el siguiente mensaje:
			"La importación se ejecutó exitosamente, se ejecutaron 13 consultas. (mis-usuarios.sql)"

Ahora ya podremos ejecutar la práctica. Escribiendo en el navegador "localhost/PW_AW/login.html" accederemos a ella.

En el formulario ya por defecto saldrá el único usuario insertado en la base de datos.

	Nombre: admin
	Pass: 1234

Una vez dentro podremos; insertar nuevos usuarios, borrarlos y modificarlos.

ATENCIÓN: Si borramos todos los usuarios y salimos no podremos volver a acceder a la práctica a no ser que insertemos el usuario desde phpMyAdmin

Alberto Lorente Sánchez.