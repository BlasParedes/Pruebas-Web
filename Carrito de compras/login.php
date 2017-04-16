<!DOCTYPE html>
<?php 
	include "conection.php";
?>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"> 
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery-3.1.1/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Carrito De Compras</h1>
		<img src="./imagenes/logo.png" id="logo">
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		<form id='formulario' method="post" action="./login/verificar.php">
			<?php
				if( isset($_GET['error']) ){
					echo "<center>Datos incorrectos</center>";
				}
			?>
			<label for="Usuario">Usuario</label>
			<input type="text" name="Usuario" id="Usuario" placeholder="Usuario">
			<label for="Pwd">Contrase&ntilde;a</label>
			<input type="password" name="Pwd" id="Pwd" placeholder="Contraseña">
			<input type="submit" name="Aceptar" id="Aceptar" value="Aceptar" class="aceptar">
		</form>
	</section>
</body>
</html>