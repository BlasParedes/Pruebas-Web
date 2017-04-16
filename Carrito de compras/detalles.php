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
		
	<?php
		$sql = "SELECT * FROM productos WHERE productoID='".$_GET['id']."';";
		$result = $mysqli->query($sql);

		while ($row = $result->fetch_assoc() ) {
		?>
		<center>
			<img src="./productos/<?php echo $row['productoImagen'];?>"><br>
			<span><?php echo $row['productoNombre'];?></span><br>
			<span><?php echo $row['productoDescr'];?></span><br>
			<span><?php echo $row['productoPrecio'];?></span><br>
			<a href="./addcarrito.php?id=<?php echo $row['productoID']; ?>">Añadir al carrito de compras</a>
		</center>
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>