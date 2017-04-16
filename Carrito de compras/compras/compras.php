<?php 
	require '../conection.php';
	session_start();
	$arreglo = $_SESSION['carrito'];
	$nVenta = 0;
	$sql = "SELECT * FROM compras ORDER BY numeroventa DESC LIMIT 1";
	$result = $mysqli->query($sql);
	while ( $row = $result->fetch_assoc()) {
		$nVenta = $row['numeroventa'];
	}
	if( $nVenta == 0){
		$nVenta = 1;
	}else{
		$nVenta++;
	}
	for ($i=0; $i < count($arreglo); $i++) { 
		$sql = "INSERT INTO compras (numeroventa, imagen, nombre, precio, cantidad, subtotal) VALUES('".$nVenta."','".$arreglo[$i]['Imagen']."','".$arreglo[$i]['Nombre']."','".$arreglo[$i]['Precio']."','".$arreglo[$i]['Cantidad']."','".$arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']."')";
		$result = $mysqli->query($sql);
	}
	$total = 0;
	
	unset($_SESSION['carrito']);
	header("Location: ../admin.php");
?>