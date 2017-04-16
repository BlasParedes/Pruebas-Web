<!DOCTYPE html>
<?php 
	include "conection.php";
?>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<script type="text/javascript" src=""></script>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript" src="./js/scripts.js"></script>
	<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"> 
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery-3.1.1/jquery-3.1.1.js"></script>
</head>
<body>
	<header>
		<h1>Carrito De Compras</h1>
		<img src="./imagenes/logo.png" id="logo">		
		<a href="./addcarrito.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		
	<?php
		$sql = "SELECT * FROM productos;";
		$result = $mysqli->query($sql);
		if($result)
		while ($row = $result->fetch_assoc() ) {
		?>
			<div class="producto">
			<center>
				<img src="./productos/<?php echo $row['productoImagen'];?>"><br>
				<span><?php echo $row['productoNombre'];?></span><br>
				<a href="./detalles.php?id=<?php echo $row['productoID']; ?>">ver</a>
			</center>
		</div>
	<?php
		}
	?>
	<a href="cerrarSesion.php">cerrar sesion</a>
		

		
	</section>
</body>
</html>