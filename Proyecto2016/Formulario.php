<?php session_start();
	if( isset($_SESSION["Cuenta"]) || isset($_SESSION["Usuario"]) || isset($_SESSION["Cedula"])){
		?>
			<script type="text/javascript">
				document.location = "/Proyecto2016/SesionIniciada.php";
			</script>
		<?php
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php require "head.html";
		require "cabezera.php";
		Cabezera("Login");
		require "MYSQLphp.php";
	?>
	<title>Login</title>
</head>
<script type="text/javascript">
	//este es script de la barra de progreso de la contraseña
	$(document).ready(function(){
		$("#pwd").change(function(){
			var tamPwd = $("#pwd").val().length;
			if(tamPwd == 0){
				$("#complejidad").css('width','0%');
				$("#complejidad").text('');
			}else if(tamPwd < 6){
				$("#complejidad").css('width','33%');
				$("#complejidad").text('poco segura');
			}else if(tamPwd < 12){
				$("#complejidad").css('width','66%');
				$("#complejidad").text('segura');
			}else{
				$("#complejidad").css('width','100%');
				$("#complejidad").text('muy segura');
			}		
		});
	});
</script>
<body>
	<?php
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		$Nacionalidad = $Cedula = $fijo = $movil = $localidad = $municipio = $direccion = $nombre = $apellido = $edad = $email = $pwd = $Cnfpwd = $sexo = "";
		$cedulaErr = $fijoErr = $movilErr = $municipioErr = $localidadErr = $direccionErr = $nombreErr = $apellidoErr = $emailErr = $pwdErr = $CnfpwdErr = $edadErr = "";
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if(empty($_POST["nombre1"])){
				$nombreErr = "Nombre requerido";
			}else{
				$nombre = test_input($_POST["nombre1"]);
				if(isset($_POST["nombre2"]))
					$nombre .= " ".test_input($_POST["nombre2"]);

				if (!preg_match("/^[a-zA-Z ]*$/", $nombre)) {
					$nombreErr = "Unicamente letras y espacios en blanco";
					$nombre = "";
				}
			}

			if( empty($_POST["municipio"]) ){
				$municipioErr = "municipio requerido";
			}else{

				$municipio = test_input($_POST["municipio"]);
				if (!preg_match("/^[a-zA-Z ]*$/", $municipio)) {
					$municipioErr = "Unicamente letras y espacios en blanco";
					$municipio = "";
				}	
			}
			if( empty($_POST["localidad"]) ){
				$localidadErr = "Localidad requerida";
			}else{

				$localidad = test_input($_POST["localidad"]);
				if (!preg_match("/^[a-zA-Z0-9 ]*$/", $localidad)) {
					$localidadErr = "Unicamente letras y espacios en blanco";
					$localidad = "";
				}	
			}

			if( empty($_POST["direccion"]) ){
				$direccionErr = "Direccion requerido";
			}else{

				$direccion = test_input($_POST["direccion"]);
				if (!preg_match("/^[a-zA-Z0-9.,: ]*$/", $direccion)) {
					$direccionErr = "Unicamente letras, números y espacios en blanco.";
					$direccion = "";
				}	
			}
			if(empty($_POST["Cedula"])){
				$cedulaErr = "Cedula requerida";
			}else{
				if( !is_numeric($_POST["Cedula"])){
					$cedulaErr = "Cedula invalida";
				}else{
					$Cedula = test_input($_POST["Cedula"]);	
					$Nacionalidad = test_input($_POST["Nacionalidad"]);
				}
			}
			if( empty($_POST["Fijo"]) ){
				$fijoErr = "Telefono fijo requerido";
			}else{
				if(is_numeric($_POST["Fijo"]))
					$fijo = $_POST["Fijo"];	
				else
					$fijoErr = "Telefono incorrecto";
			}
			if(isset($_POST["Movil"])){
				if(is_numeric($_POST["Movil"]))
					$movil = $_POST["Movil"];
				else
					$movilErr = "Telefono incorrecto";					
			}
			if(empty($_POST["apellido1"])){
				$apellidoErr = "Apellido requerido";
			}else{
				$apellido = test_input($_POST["apellido1"]);
				if(isset($_POST["apellido2"]))
					$apellido .= " ".test_input($_POST["apellido2"]);
				if (!preg_match("/^[a-zA-Z ]*$/", $apellido)) {
					$apellidoErr = "Unicamente letras y espacios en blanco";
					$apellido = "";
				}
			}

			if(empty($_POST["edad"])){
				$edadErr = "Edad requerida";
			}else{
				$edad = intval($_POST["edad"]);
				if (!filter_var($edad, FILTER_VALIDATE_INT)) {
					$edadErr = "Unicamente numeros";
					$edad = "0";
				}
			}

			if(empty($_POST["email"])){
				$emailErr = "Edad requerida";
			}else{
				$email = test_input($_POST["email"]);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Correo Ingresado es invalido";
					$email = "";
				}
			}
			
			if(empty($_POST["pwd"])){
				$pwdErr = "Contrase&ntildea requerida";
			}else{
				$pwd = test_input($_POST["pwd"]);
				if (!preg_match("/^[a-zA-Z0-9 ]*$/", $pwd)) {
					$pwdErr = "Unicamente letras y numeros";
					$pwd = "";
				}
				
			}

			if(empty($_POST["pwd"])){
				$CnfpwdErr = "Se requiere Confirmar la contrase&ntildea";
			}else{
				$Cnfpwd = test_input($_POST["Cnfpwd"]);
				if($Cnfpwd != $pwd){
					$CnfpwdErr = "Contrase&ntildeas diferentes";
					$pwd = "";
				}
				else{
					$opciones = [
						'cost' => 15,
						'salt' => mcrypt_create_iv(30,MCRYPT_DEV_URANDOM),
					];
					
					$pwd = password_hash($pwd, PASSWORD_BCRYPT,$opciones); 
					
				}
			}

			$sexo = test_input($_POST["sexo"]);		
		}
	?>
	<br>
	<br>
	<br>
	 <div class = "container">
	 <div id = "panel">  
	 	<br>
	 	<div class = "row">
	 		<div class = "col-sm-2"></div>
	 		<div class = "col-sm-8">
		 		<h1>Formulario de Ingreso a la Pagina</h1>
		 		<p class ="text-danger">(*)Campo requerido</p>
	 		</div>
	 	</div>		 		 
	 	<form class="form-horizontal" method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		  <div class="form-group">
		    <label class="control-label col-sm-2" for = "email">Correo Electronico:</label>
		    <div class="col-sm-6">
		      <input type="email" class="form-control" name="email" value = "<?php echo $email;?>" placeholder="Introduzca su Email" required>
		      <p class = "text-danger">(*) <?php echo $emailErr;?></p>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Contrase&ntilde;a:</label>
		    <div class="col-sm-6">
		      <input type="password" class="form-control" id ="pwd" name="pwd" placeholder="Introduzca su contraseña" required>
		      <p class = "text-danger">(*) <?php echo $pwdErr;?></p>
		    </div>		    
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Confirmar Contrase&ntilde;a:</label>
		    <div class="col-sm-6">
		      <input type="password" class="form-control" name="Cnfpwd" placeholder="Confirmar contraseña" id = "Cnfpwd" required>
		      <p class = "text-danger">(*) <?php echo $CnfpwdErr;?></p>
		    </div>
		  </div>  		 		  

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Complejidad:</label>
		    <div class="col-sm-6">
			  <div class = "progress" style = "width: 400px;">
			    	<div class = "progress-bar progress-bar-striped active" role = "progressbar" aria-valuenow = "0" aria-valuemin="0" aria-valuemax="100" style="width:0%" id = "complejidad"></div>
			  </div>
			</div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2">Edad:</label>
		    <div class="col-sm-2">
		      <input type="text" class="form-control" name="edad" value = "<?php echo $edad;?>" placeholder="Introduzca su edad" required>
		      <p class = "text-danger">(*) <?php echo $edadErr;?></p>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2">C&eacute;dula:</label>
		    <div class="col-sm-1">
		      <select name="Nacionalidad" class = "form-control">
		      	<option value = 'V'>V</option>
		      	<option value = 'E'>E</option>
		      </select> 
		    </div>
		    <div class="col-sm-3">
		      <input type="text" class="form-control" name="Cedula" value = "<?php echo $Cedula;?>" placeholder="Introduzca su cedula, si es menor de edad Introduzca la de su representante" required>
		      <p class = "text-danger">(*) <?php echo $cedulaErr;?></p>
		    </div>
		  </div>

		   <div class="form-group">		  	
		    <label class="control-label col-sm-2">Nombre:</label>
		    <div class="col-sm-3">
		      <input type="text" class="form-control" name="nombre1" placeholder="Primer nombre" required>
		      <p class = "text-danger">(*) <?php echo $nombreErr;?></p>
		    </div>
		    <div class="col-sm-3">
		      <input type="text" class="form-control" name="nombre2" placeholder="Segundo nombre" >
		    </div>
		  </div>
   
		  <div class="form-group">	
		    <label class="control-label col-sm-2">Apellidos:</label>
		    <div class="col-sm-3">
		      <input type="text" class="form-control" name="apellido1"  placeholder="Primer Apellido" required>
		      <p class = "text-danger">(*) <?php echo $apellidoErr;?></p>
		    </div>
		    <div class="col-sm-3">
		      <input type="text" class="form-control" name="apellido2"  placeholder="Segundo Apellido">
		    </div>
		  </div>	  
		  
		  <div class="form-group">
		  	<label class="control-label col-sm-2">Sexo:</label>
			  <label class = "radio-inline">
			  	<input type="radio" name="sexo" value = "Masculino" checked>
			  	Masculino
			  </label>
			  <label class = "radio-inline">
			  	<input type="radio" name="sexo" value = "Femenino">
			  	Femenino
			  </label>
		  </div>		  
		  
  		  <div class="form-group">
		    <label class="control-label col-sm-2">Municipio:</label>
		    <div class="col-sm-3">
		      <input type="text" class="form-control" name="municipio" value = "<?php echo $municipio;?>" placeholder="Municipio" required>
		      <p class = "text-danger">(*) <?php echo $municipioErr;?></p>
		    </div>
		  </div>

  		  <div class="form-group">
		    <label class="control-label col-sm-2">Localidad:</label>
		    <div class="col-sm-3">
		      <input type="text" class="form-control" name="localidad" value = "<?php echo $localidad;?>" placeholder="Localidad" required>
		      <p class = "text-danger">(*) <?php echo $localidadErr;?></p>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2">Direcci&oacute;n exacta:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="direccion" value = "<?php echo $direccion;?>" placeholder="Dirección exacta" required>
		      <p class = "text-danger">(*) <?php echo $direccionErr;?></p>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2">Tel&eacute;fonos:</label>
		    <div class="col-sm-3">
		      <input type="text" class="form-control" name="Fijo" value="<?php echo $fijo;?>" placeholder="Fijo Ej. 02765555555" required>
		      <p class = "text-danger">(*) <?php echo $fijoErr;?></p>
		    </div>
		    <div class="col-sm-3">
		      <input type="text" class="form-control" name="Movil" value="<?php echo $movil;?>" placeholder="Movil Ej. 04145555555">
		      <p class = "text-danger"><?php echo $movilErr;?></p>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="control-label col-sm-4"></label>
		    <div class="btn-group">
		      <button type="submit" class="btn btn-default" id = "crearCuenta">Crear Cuenta</button>
		      <a href="/Proyecto2016/index.php" class = " btn btn-default" role = "button">Regresar</a>
		    </div>
		  </div>
		  </form>	
		  <br>  
	  </div>
	  </div>
	<?php	
	  	if(!empty($nombre) && !empty($apellido) && !empty($edad) && !empty($email) && !empty($pwd) && !empty($sexo) && !empty($direccion) && !empty($fijo) && !empty($Cedula)){
			#aquí va el codigo de guardar en la Base de Datos		
			if(!($link = Conectar("proyecto2016"))){
				echo '<script type="text/javascript">alert("Error");</script>'; 
				die("Error al conectar.");
			}
				$array = array($nombre,$apellido,$Nacionalidad,$Cedula,$municipio,$localidad,$direccion,$edad,$email,$pwd,$sexo,$fijo,$movil);
				$valores = array("Nombre","Apellido","Nacionalidad","Cedula","Municipio","Localidad","Direccion","Edad","Email","Password","Sexo","Fijo","Movil");
			
			if(Buscar("Nombre",$nombre,"usuarios",$link) and Buscar("Apellidos",$apellido,"usuarios",$link)){
				$nombreErr = "Nombre encontrado en la base de datos";
				$apellidoErr = "Apellidos encontrados en la base de datos";
				?>
					<script type="text/javascript">
						alert('Error');
					</script>
				<?php
			}else if(Buscar("Email",$email,"usuarios",$link)){
				$emailErr = "Email encontrado en la base de datos";
			}else if(Buscar("Cedula",$Cedula,"usuarios",$link)){
				echo '<script type="text/javascript">alert("cedula encontrada");</script>';
				$cedulaErr = "Cedula encontrada en la base de datos";
			}else if(AgregarDatos($valores,$array,"usuarios",$link)){
				$link->close();
				echo '<script type="text/javascript">alert("Cuenta creada satisfactoriamente");</script>';

				if(!($link = Conectar("proyecto2016"))){
					die("Error al conectar a la base de datos".$link->connect_error);
				}
				$sql = "SELECT * FROM usuarios WHERE email='".$email."' AND password='".$pwd."'";
				$result = $link->query($sql);
				if($result->num_rows > 0){
					$row = $result->fetch_assoc();
					$_SESSION["Cuenta"] = 2;
					$_SESSION["Usuario"] = $row["Nombre"]." ".$row["Apellido"];
					$_SESSION["Nacionalidad"] = $row["Nacionalidad"];
					$_SESSION["Cedula"] = $row["Cedula"];
					foreach ($row as $key => $value) {
						$_SESSION[$key] = $value;
					}
					$link->close();
					?>
						<script language="JavaScript" type="text/javascript">
							document.location="SesionIniciada.php";
						</script>
					<?php
				}
				 
			}
			else{
				echo "<p>Error: " . $link->error."</p>";
			}
			
			
			#esta va a ser la redireccion a la nueva pagina de perfil
		}
		include("footer.php");
	 ?>
</body>
</html>