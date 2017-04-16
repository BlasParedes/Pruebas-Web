<?php
	include '../conection.php';
	if($_POST['caso'] == 'eliminar'){
		$sql = "DELETE FROM productos WHERE productoID=".$_POST['Id'].";";
		if( $mysqli->query($sql) !== TRUE){
			echo $mysqli->error;
		}else{
			$ruta = '../productos/'.$_POST['Imagen'];
			unlink($ruta);
			echo 'El producto fué eliminado exitosamente';
		}
	}elseif($_POST['caso'] == 'modificar'){
		$Nombre = $_POST['Nombre'];
		$Descripcion = $_POST['Descripcion'];
		$Precio = $_POST['Precio'];
		$sql = "UPDATE productos 
		SET productoNombre='$Nombre', productoDescr='$Descripcion', productoPrecio='$Precio' 
		WHERE productoID=".$_POST['Id'].";";
		if( $mysqli->query($sql) !== TRUE){
			echo $mysqli->error;
		}else{
			echo 'El producto fué modificado exitosamente';
		}
	}
?>