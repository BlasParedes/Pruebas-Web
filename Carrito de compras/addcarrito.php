<!DOCTYPE html>
<?php 
	include "conection.php";
	session_start();
	if( !isset($_SESSION['Usuario']) ){
		$id = isset($_GET['id'])? '?id='.$_GET['id'] : '';
		header("Location: ./Login.php".$id);
	}
	if( isset($_SESSION['carrito'])){
		if(isset($_GET)){
			$arreglo = $_SESSION['carrito'];
			$encontro = false;
			$numero = 0;
			for ($i=0; $i < count($arreglo) && !$encontro; $i++) { 
				if( $arreglo[$i]['Id'] == $_GET['id'] ){
					$encontro = true;
					$numero = $i;
				}
			}
			if( $encontro ){
				$arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
				$_SESSION['carrito'] = $arreglo;
			}else{
				$sql = "SELECT * FROM productos WHERE productoID='".$_GET['id']."';";
				$Nombre = "";
				$Precio = 0;
				$Imagen = "";
				$result = $mysqli->query($sql);
				if($result){
					while ( $row = $result->fetch_assoc() ) {
						$Nombre = $row['productoNombre'];
						$Precio = $row['productoPrecio'];
						$Imagen = $row['productoImagen'];
					}
					$datosNuevos=array('Id'=>$_GET['id'],
									'Nombre'=>$Nombre,
									'Precio'=>$Precio,
									'Imagen'=>$Imagen,
									'Cantidad'=>1);
					array_push($arreglo, $datosNuevos);
					$_SESSION['carrito'] = $arreglo;
				}else{
					die('Error en la conexion');
				}			
			}
		}
	}else{
		if( isset($_GET['id']) ){
			$sql = "SELECT * FROM productos WHERE productoID='".$_GET['id']."';";
			$Nombre = "";
			$Precio = 0;
			$Imagen = "";
			$result = $mysqli->query($sql);
			if($result){
				while ( $row = $result->fetch_assoc() ) {
					$Nombre = $row['productoNombre'];
					$Precio = $row['productoPrecio'];
					$Imagen = $row['productoImagen'];
				}				
				$arreglo[]=array('Id'=>$_GET['id'],
								'Nombre'=>$Nombre,
								'Precio'=>$Precio,
								'Imagen'=>$Imagen,
								'Cantidad'=>1);
				$_SESSION['carrito']=$arreglo;
			}else{
				die('Error en la conexion');
			}			
		}
	}
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
			$total = 0;
			if( isset($_SESSION['carrito']) ){
				$datos = $_SESSION['carrito'];				
				for ($i=0; $i < count($datos); $i++) { 
					?>
					<div class="producto">
						<center>
							<img src="./productos/<?php echo $datos[$i]['Imagen']; ?>"><br>
							<span><?php echo $datos[$i]['Nombre']; ?></span><br>
							<span>Precio: <?php echo $datos[$i]['Precio']; ?></span><br>
							<span>Cantidad: 
								<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
								data-precio="<?php echo $datos[$i]['Precio'];?>"
								data-id="<?php echo $datos[$i]['Id'];?>"
								class="cantidad">
							<span class="subtotal">Subtotal: <?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio']; ?></span>
							<a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']; ?>">Eliminar</a>
						</center>
					</div>
					<?php
					$total += ($datos[$i]['Cantidad']*$datos[$i]['Precio']);
				}
			}else{
				echo "<center><h2>El carrito de compras está vacío</h2></center>";
			}
			?>
			<center><h2 id="Total">Total: <?php echo $total; ?></h2></center>
			<?php 
				if( $total != 0){
					?>
					<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>
					<?php
				}
			?>
			<center><a href="index.php">Ver catalogo</a></center>

	</section>
</body>
</html>