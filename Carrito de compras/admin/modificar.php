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
	<script type="text/javascript" src="./modificar.js"></script>
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
			    <li><a href="./Agregar.php" >Agregar</a></li>
			    <li><a href="#" class="selected">Modificar</a></li>
			    <li><a href="../login/cerrar.php">Salir</a></li>
		  	</menu>
		</nav>	
		<h1>Modificar y/o eliminar</h1>
		<table width="100%">
			<tr>
				<td>ID</td>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Modificar</td>
				<td>Eliminar</td>
			</tr>
			<?php
				$sql = "SELECT * FROM productos;";
				$result = $mysqli->query($sql);
				while ( $row = $result->fetch_assoc() ) {
					echo "<tr>";
					?>
					<td>
						<input type="hidden" value="<?php echo $row['productoID']; ?>"><?php echo $row['productoID']; ?>						
						<input type="hidden" class="imagen" value="<?php echo $row['productoImagen']; ?>">
					</td>
					<td><input type="text" class="nombre" value="<?php echo $row['productoNombre']; ?>"></td>
					<td><input type="text" class="descripcion" value="<?php echo $row['productoDescr']; ?>"></td>
					<td><input type="text" class="precio" value="<?php echo $row['productoPrecio']; ?>"></td>
					<td><button class="modificar" data-id="<?php echo $row['productoID']; ?>">Modificar</button></td>
					<td><button class="eliminar" data-id="<?php echo $row['productoID']; ?>">Eliminar</button></td>
					

					<?php
					echo "</tr>";
				}
			?>
		</table>
	</section>
</body>
</html>