<?php
	session_start();
	include 'conection.php';
	
	if( isset($_POST['Usuario']) && isset($_POST['Pwd']) ){
		$sql = "SELECT * FROM usuario WHERE usuarioUser = '".$_POST['Usuario']."' AND usuarioPwd ='".$_POST['Pwd']."' ;";
		$result = $mysqli->query($sql);
		if( $result && $result->num_rows > 0){
			while ( $row = $result->fetch_assoc()) {
				$arreglo = array('Nombre' => $row['usuarioNombre'], 'Apellido' => $row['usuarioApellido'], 'Imagen' => $row['usuarioImagen'] );
			}

			if( isset($arreglo) ){
				$_SESSION['Usuario'] = $arreglo;
				header("Location: ../admin.php");
			}else{
				header("Location: ../login.php?error=datos no validos");
			}
		}else{
			die($mysqli->error);
		}
	}else{
		?>
		<script type="text/javascript">
			alert('Error al introducir los datos');
			document.location = "login.php";
		</script>
		<?php
	}
?>