<?php
	require 'conection.php';
	if( !isset($_POST['Nombre']) || !isset($_POST['Descripcion']) || !isset($_POST['Precio']) ){
		header("Location: Agregar.php");
	}else{
		$direccion = "./productos/";
		$permitidos = array("image/gif","image/png","application/pdf","image/gif");
		if( in_array($_FILES['Imagen']['type'], $permitidos) && $_FILES['Imagen']['size'] < 500000 ){
			if( $_FILES['Imagen']['type'] > 0 ){
				echo "error numero:".$_FILES['Imagen']['type']."<br>";
			}else{
				$archivo = $direccion.$_FILES["Imagen"]["name"];
				if( file_exists($archivo)){
					echo "error: El archivo ya existe<br>";
				}elseif ( !move_uploaded_file($_FILES["Imagen"]['tmp_name'],$archivo)) {
					echo "error: No se pudo subir el archivo<br>";
				}else{
					$Nombre = $_POST['Nombre'];
					$Descripcion = $_POST['Descripcion'];
					$Precio = $_POST['Precio'];
					$Imagen = $_FILES["Imagen"]["name"];
					$sql = "INSERT INTO productos (productoNombre, productoDescr, productoImagen,productoPrecio) VALUES ('$Nombre','$Descripcion','$Imagen','$Precio');";
					if( $mysqli->query($sql) === TRUE){
						header('Location: ./admin.php')
					}else{
						die('Error: '.$mysqli->error );
					}
				}
			}
		}else{
			echo "error en el formato o el tamaño del archivo<br>";
		}
	}
?>