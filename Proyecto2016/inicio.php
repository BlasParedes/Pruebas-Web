<?php session_start();
	require "MYSQLphp.php";
	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	$email = $pwd = "";
	$Error = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["email"])){
			$Error = "Correo o contraseña invalida";
		}else{
			$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$Error = "Correo o contraseña invalida";
				$email = "";
			}
		}
		if(empty($_POST["pwd"])){
				$Error = "Correo o contraseña invalida";
		}else{
			$pwd = test_input($_POST["pwd"]);
			if (!preg_match("/^[a-zA-Z0-9]*$/", $pwd)) {
				$Error = "Correo o contraseña invalida";
				$pwd = "";
			}
		}
		if($email != "" && $pwd != ""){
			#realizar la consulta en MYSQL
			if($email == "Alcaldia@Sistema.com" && $pwd == "elazote"){
				$_SESSION["Cuenta"] = 1;
				$_SESSION["Usuario"] = "Alcaldia";
				$_SESSION["Cedula"] = 1;
				echo "<script>alert('sesion iniciada satisfactoriamente')</script>";
					echo '<script language="JavaScript" type="text/javascript">document.location="Sistema.php";</script>';
			}else{
				if(!($link = Conectar("proyecto2016"))){
					die("Error al conectar a la base de datos".$link->connect_error);
				}

				$sql = "SELECT * FROM usuarios WHERE email='".$email."'";
				$result = $link->query($sql);
				if($result->num_rows > 0){
					$row = $result->fetch_assoc();
					if(password_verify($pwd,$row["Password"])){
						$_SESSION["Cuenta"] = 2;
						$_SESSION["Usuario"] = $row["Nombre"]." ".$row["Apellido"];
						$_SESSION["Nacionalidad"] = $row["Nacionalidad"];
						$_SESSION["Cedula"] = $row["Cedula"];
						foreach ($row as $key => $value) {
							$_SESSION[$key] = $value;
						}
						echo "<script>alert('sesion iniciada satisfactoriamente')</script>";
						echo '<script language="JavaScript" type="text/javascript">document.location="SesionIniciada.php";</script>';
					}else{
						?>
							<script type="text/javascript">
								alert('Error en los datos ingresados');
								document.location = ""
							</script>
						<?php
					}					
					$link->close();
					
				}else{
					echo "<script>alert('No se pudo iniciar sesión')</script>";
					echo '<script language="JavaScript" type="text/javascript">document.location="index.php";</script>';
				}
			}						
		}
	}
?>