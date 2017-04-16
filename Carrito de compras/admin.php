<!DOCTYPE html>
<?php 
	session_start();
	include "conection.php";
	if( !isset($_SESSION['Usuario'])){
		header('Location: ../index.php');
	}
?>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"> 
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery-3.1.1/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="./js/scripts.js"></script>
</head>
<body>
	<header>		
		<img src="./imagenes/logo.png" id="logo">
		<a href="./addcarrito.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		<nav class="menu2">
			<menu>
			    <li><a href="./">Inicio</a></li>
			    <li><a href="#" class="selected">Admin</a></li>
			    <li><a href="./admin/Agregar.php" >Agregar</a></li>
			    <li><a href="./admin/modificar.php" >Modificar</a></li>
			    <li><a href="./login/cerrar.php">Salir</a></li>
		  	</menu>
		</nav>	
		<center><h1>Últimas Compras</h1></center>
		<table border="1px" width="100%">
			<tr>
				<td>Imagen</td>
				<td>Nombre</td>
				<td>Precio</td>
				<td>Cantidad</td>
				<td>Subtotal</td>
			</tr>	
			<?php
				$sql = "SELECT * FROM compras";
				$result = $mysqli->query($sql);
				$nVenta = 0;
				if( $result->num_rows > 0){
					while ( $row = $result->fetch_assoc() ) {
						if( $nVenta != $row['numeroventa']){
							echo '<tr>';
							?>
							<td>Comprar Numero: <?php echo $row['numeroventa']; ?></td>
							<?php
							echo '</tr>';
						}
						$nVenta=$row['numeroventa'];
						echo '<tr>
							<td><img src="./productos/'.$row['imagen'].'" width="100px" heigth="100px" /></td>
							<td>'.$row['nombre'].'</td>
							<td>'.$row['precio'].'</td>
							<td>'.$row['cantidad'].'</td>
							<td>'.$row['subtotal'].'</td>

						</tr>';
					}
				}else{
					echo '<center><h2>No hay productos para mostrar</h2></center>';
				}
			?>
		</table>	
	</section>
</body>
</html>