<!DOCTYPE html>
<?php 
	session_start();
	include "../conection.php";
	if( !isset($_SESSION['Usuario'])){
		header('Location: ../index.php');
	}
?>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"> 
	<script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../jquery-3.1.1/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>
</head>
<body>
	<header>		
		<img src="../imagenes/logo.png" id="logo">
		<a href="../addcarrito.php" title="ver carrito de compras">
			<img src="../imagenes/carrito.png">
		</a>
	</header>
	<section>
		<nav class="menu2">
			<menu>
			    <li><a href="../index.php">Inicio</a></li>
			    <li><a href="../admin.php" >Admin</a></li>
			    <li><a href="#" class="selected">Agregar</a></li>
			    <li><a href="./modificar.php" >Modificar</a></li>
			    <li><a href="../login/cerrar.php">Salir</a></li>
		  	</menu>
		</nav>	
		<center><h1>Agregar nuevo producto</h1></center>
		<form action="altaproducto.php" method="post" enctype="multipart/form-data">
			<fieldset>
				Nombre<br>
				<input type="text" name="Nombre" id="Nombre" required>
			</fieldset>
			<fieldset>
				Descripcion<br>
				<input type="text" name="Descripcion" id="Descripcion" required>
			</fieldset>
			<fieldset>
				Imagen<br>
				<input type="file" name="Imagen" id="Imagen" required accept="image/*">
			</fieldset>
			<fieldset>
				Precio<br>
				<input type="text" name="Precio" id="Precio" required>
			</fieldset>
			<input type="submit" name="enviar" value="Enviar" class="aceptar">
		</form>
	</section>
</body>
</html>