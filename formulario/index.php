<!DOCTYPE html>
<html lang="es">
	<?php 
		function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
  			$data = htmlspecialchars($data);
  			return $data;
		}
		$LineaP = $LineaS = $Nacionalidad = $UserName = $NombreP = $Municipio = $Ciudad = $email = $Direccion = $NombreS = $pwd = $pwdR = $Cedula = $ApellidoP = $ApellidoS = $Web = $TelefonoP = $TelefonoS = $Estado = "";
		$Edad = 5;
		$EdadErr = $UserNameErr = $NombreErr = $CiudadErr = $DireccionErr = $pwdErr = $emailErr = $pwdRErr = $CedulaErr = $ApellidoErr = $MunicipioErr = $WebErr = $TelefonoErr = $EstadoErr = $ImagenErr = "";
	?>
	<head>
		<meta charset="utf-8">
		<title>Formulario</title>
		<script type="text/javascript" src="jquery-3.1.1/jquery-3.1.1.js"></script>
		<script type="text/javascript" src="Frontend/Validaciones.js"></script>
		<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"> 
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
			if( isset($_POST["Enviar"]) &&  $_POST["Enviar"] == "Enviar"){
				if( !empty($_POST["UserName"]) ){
					$UserName = test_input($_POST["UserName"]);
				}else{
					$UserNameErr = "UserName Faltante";
				}				

				if( empty($_POST["pwd"]) ){
					$pwdErr = "Contraseña vacía";
				}elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/", $_POST["pwd"])) {
					$pwdErr = "Contraseña incorrecta";					
				}else{
					$pwd = test_input($_POST["pwd"]);
				}

				if( empty($_POST["pwdR"]) ){
					$pwdRErr = "Debe repetir su Contraseña";
				}elseif ( strcmp($_POST["pwdR"], $pwd)  != 0) {
					$pwdRErr = "Contraseñas diferentes";					
				}else{
					$pwdR = test_input($_POST["pwdR"]);
					$opciones = [
						'cost' => 15,
						'salt' => mcrypt_create_iv(30,MCRYPT_DEV_URANDOM),
					];
					$pwd = password_hash($pwd, PASSWORD_BCRYPT,$opciones); 
				}

				if( empty($_POST["email"])){
					$emailErr = "Email vacio";
				}else{
					$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
					if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) !== false){
						$emailErr = "Email invalido";
						$email = "";					
					}
				}

				if( !empty($_POST["Web"]) ){
					$Web = filter_var($_POST["Web"],FILTER_SANITIZE_URL);
					if( !filter_var( $Web, FILTER_VALIDATE_URL ) !== false){
						$WebErr = "Pagina web invalida";
						$Web = "";					
					}
				}

				if( empty($_POST["Cedula"]) ){
					$CedulaErr = "Cedula Vacia";
				}else{
					$Cedula = test_input($_POST["Cedula"]);
					if( filter_var($Cedula,FILTER_VALIDATE_INT) === 0){
						$CedulaErr = "Cedula invalida";
						$Cedula = "";		
					}else{
						$Nacionalidad = test_input($_POST["Nacionalidad"]);
					}
				}

				if( empty($_POST["NombreP"]) ){
					$NombreErr = "Nombre principal vacía";
				}elseif (!preg_match("/^[A-Za-z]+$/", $_POST["NombreP"])) {
					$NombreErr = "Nombre principal incorrecto";					
				}else{
					$NombreP = test_input($_POST["NombreP"]);
				}
				if( !empty($_POST["NombreS"]) ){
					if(!preg_match("/^[A-Za-z]+$/", $_POST["NombreS"])){
						$NombreErr = "Nombre secundario incorrecto";			
					}else{
						$NombreS = test_input($_POST["NombreS"]);
					}
				}

				if( empty($_POST["ApellidoP"]) ){
					$ApellidoErr = "Apellido principal vacía";
				}elseif (!preg_match("/^[A-Za-z]+$/", $_POST["ApellidoP"])) {
					$ApellidoErr = "Apellido principal incorrecto";					
				}else{
					$ApellidoP = test_input($_POST["ApellidoP"]);
				}
				if( !empty($_POST["ApellidoS"]) ){
					if(!preg_match("/^[A-Za-z]+$/", $_POST["ApellidoS"])){
						$ApellidoErr = "Apellido secundario incorrecto";			
					}else{
						$ApellidoS = test_input($_POST["ApellidoS"]);
					}
				}

				if( empty($_POST["Edad"]) ){
					$EdadErr = "Edad Vacia";
				}else{
					$Edad = test_input($_POST["Edad"]);
					if( filter_var($Edad,FILTER_VALIDATE_INT) === 0 || $Edad > 120){
						$EdadErr = "Edad invalida";
						$Edad = "";		
					}
				}

				$Sexo = test_input($_POST["Sexo"]);
				if( empty($_POST["TelefonoP"]) ){
					$TelefonoErr = "Telefono Principal Vacio";
				}else{
					$TelefonoP = test_input($_POST["TelefonoP"]);
					if( filter_var($TelefonoP,FILTER_VALIDATE_INT) === 0 && strlen($TelefonoP) != 7){
						$TelefonoErr = "Telefono Principal invalido";
						$TelefonoP = "";		
					}else{
						$LineaP = test_input($_POST["LineaP"]);
					}
				}

				if( !empty($_POST["TelefonoS"]) ){
					$TelefonoS = test_input($_POST["TelefonoS"]);
					if( filter_var($TelefonoS,FILTER_VALIDATE_INT) === 0 && strlen($TelefonoS) != 7){
						$TelefonoErr = "Telefono Secundario invalido";
						$TelefonoS = "";		
					}else{
						$LineaS = test_input($_POST["LineaS"]);
					}
				}

				if( empty($_POST["Estado"]) ){
					$EstadoErr = "Estado Vacio";
				}elseif ( $_POST["Estado"] == 0 ) {
					$EstadoErr = "Estado invalido";
				}else{
					$Estado = test_input($_POST["Estado"]);
				}

				if( empty($_POST["Municipio"]) ){
					$MunicipioErr = "Municipio Vacio";
				}elseif ( $_POST["Municipio"] == 0 ) {
					$MunicipioErr = "Municipio invalido";
				}else{
					$Municipio = test_input($_POST["Municipio"]);
				}
				
				if( empty($_POST["Ciudad"]) ){
					$CiudadErr = "Ciudad Vacio";
				}elseif ( !preg_match("/^[\w\sñÑáéíóúÁÉÍÓÚ]+$/", $_POST["Ciudad"]) ) {
					$CiudadErr = "Ciudad incorrecto";
				}else{
					$Ciudad = test_input($_POST["Ciudad"]);
				}

				if( empty($_POST["Direccion"]) ){
					$DireccionErr = "Direccion Vacio";
				}elseif ( !preg_match("/^[\w\s,ñÑáéíóúÁÉÍÓÚ]+$/", $_POST["Direccion"]) ) {
					$DireccionErr = "Direccion incorrecto";
				}else{
					$Direccion = test_input($_POST["Direccion"]);
				}

				if($_FILES['Imagen']['error'] <= 0){
					$permitidos = array("image/gif","image/jpg","image/jpeg","image/png","application/pdf");
					$check = getimagesize($_FILES["Imagen"]["tmp_name"]);
					if( $check === false){
						$ImagenErr = "Archivo no es una imagen";
					}elseif (!in_array($_FILES['Imagen']['type'], $permitidos) ){
						$ImagenErr = "Tipo de Archivo no permitido";
					}elseif ( $_FILES["Imagen"]['size'] > 500000) {
						$ImagenErr = "Archivo demasiado grande";
					}
				}


			}
		?>
		<div class="container">
			<div class="col-sm-2" style="background-color: blue;"></div>
			<div class="col-sm-10">
				<div class="row">
					<h2 style="text-align: center;">FORMULARIO PRUEBA</h2>
				</div>
				<form enctype="multipart/form-data" method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" autocomplete="off">
					<p class="text-danger">*) Campo obligat&oacute;rio</p>

					<div class="form-group">
						<label for="UserName" class="col-sm-2">Nombre de Usuario: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="UserName" id="UserName" value="<?php echo $UserName;?>" placeholder="Diga su nombre de usuario" require>
							<p class="text-danger">*) <?php echo $UserNameErr;?></p>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-sm-2">Contrase&ntilde;a: </label>
						<div class="col-sm-10">
							<input class="form-control" type="password" name="pwd" id="pwd" placeholder="Diga su contrase&ntilde;a" required>
							<p class="text-danger">*) <?php echo $pwdErr;?></p>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-sm-2">Repita la contrase&ntilde;a</label>
						<div class="col-sm-10">
							<input class="form-control" type="password" name="pwdR" id="pwdR" placeholder="Repita la contrase&ntilde;a" required>
							<p class="text-danger"><?php echo "*)",$pwdRErr;?></p>
						</div>
					</div>

					<div class="form-group">
						<label for="pwd" class="control-label col-sm-2">Complejidad:</label>
						<div class="col-sm-6">
							<div class = "progress" style = "width: 400px;">
								<div class = "progress-bar progress-bar-striped active" role = "progressbar" aria-valuenow = "0" aria-valuemin="0" aria-valuemax="100" style="width:0%" id = "complejidad"></div>
							</div>
						</div>					
					</div>
					
					<div class="form-group">
						<label for="email" class="col-sm-2">Diga su Email: </label>
						<div class="col-sm-10">
							<input class="form-control" type="email" name="email" id="email" placeholder="Diga su Email" value="<?php echo $email; ?>">
							<p class="text-danger"><?php echo "*)".$emailErr;?></p><br>
						</div>
					</div>

					<div class="form-group">
						<label for="web" class="col-sm-2">Pagina Web</label>
						<div class="col-sm-10">
							<input class="form-control" type="url" name="Web" id="Web" placeholder="Ingrese su pagina web (op) " value="<?php echo $Web; ?>">
							<p class="text-danger"><?php echo $WebErr; ?></p>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="cedula" class="col-sm-2">Cedula:</label>
						<div class="col-sm-2">
							<select name="Nacionalidad" id="Nacionalidad" class="form-control">
								<option value="V" <?php if($Nacionalidad == "V") echo "selected"; ?> >V</option>
								<option value="E" <?php if($Nacionalidad == "V") echo "selected"; ?> >E</option>
							</select>
							<p class="text-danger"><?php echo '*) ',$CedulaErr;?></p>
						</div>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="Cedula" id="Cedula" placeholder="Ingrese su # de cedula" value="<?php echo $Cedula; ?>">
						</div>					
					</div>

					
					<div class="form-group">
						<label for="nombre" class="col-sm-2">Nombre:</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="NombreP" id="NombreP" placeholder = "Primer Nombre" value="<?php echo $NombreP; ?>" required>
							<p class="text-danger"><?php echo "*)",$NombreErr; ?></p>
						</div>
						<div class="col-sm-5"> 
							<input class="form-control" type="text" name="NombreS" id="NombreS" placeholder = "Segundo Nombre (op)" value="<?php echo $NombreS; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="nombre" class="col-sm-2">Apellido:</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="ApellidoP" id="ApellidoP" placeholder = "Primer Apellido" value="<?php echo $ApellidoP; ?>" required>
							<p class="text-danger"><?php echo "*)",$ApellidoErr; ?></p>
						</div>
						<div class="col-sm-5"> 
							<input class="form-control" type="text" name="ApellidoS" id="ApellidoS" placeholder = "Segundo Apellido (op)" value="<?php echo $NombreS; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="edad" class="col-sm-2">Edad:</label>
						<div class="col-sm-2">
							<input class="form-control" type="number" name="Edad" id="Edad" min="0" max="120" value="<?php echo $Edad; ?>">
							<p class="text-danger"><?php echo "*)",$EdadErr;?></p>
						</div>
					</div>

					<div class="form-group">
						<label for="sexo" class="control-label col-sm-2">Sexo:</label>
						<label class="radio-inline">
							<input type="radio" name="Sexo" id="Sexo" value="M" checked>Hombre
						</label>
						<label class="radio-inline">
							<input type="radio" name="Sexo" id="Sexo" value="F">Mujer
						</label>					
					</div>

					<div class="form-group">
						<label for="TelefonoP" class="col-sm-2">Numero de Telefono:</label>
						<div class="col-sm-2">
						<select class="form-control" name="LineaP">
							<option value="0276" <?php if($LineaP == "0276") echo "selected"; ?> >0276</option>
							<option value="0414" <?php if($LineaP == "0414") echo "selected"; ?> >0414</option>
							<option value="0424" <?php if($LineaP == "0424") echo "selected"; ?> >0424</option>
							<option value="0416" <?php if($LineaP == "0416") echo "selected"; ?> >0416</option>
							<option value="0426" <?php if($LineaP == "0426") echo "selected"; ?> >0426</option>
							<option value="0412" <?php if($LineaP == "0412") echo "selected"; ?> >0412</option>
						</select>
						</div>
						<div class="col-sm-3">
							<input class="form-control" type="text" name="TelefonoP" id="TelefonoP" placeholder="Telefono Principal" value = "<?php echo $TelefonoP;?>" required>
							<p class="text-danger"><?php echo "*)",$TelefonoErr; ?></p>
						</div>

						<div class="col-sm-2">
							<select class="form-control" name="LineaS">
								<option value="0276" <?php if($LineaP == "0276") echo "selected"; ?> >0276</option>
								<option value="0414" <?php if($LineaS == "0414") echo "selected"; ?> >0414</option>
								<option value="0424" <?php if($LineaS == "0424") echo "selected"; ?> >0424</option>
								<option value="0416" <?php if($LineaS == "0416") echo "selected"; ?> >0416</option>
								<option value="0426" <?php if($LineaS == "0426") echo "selected"; ?> >0426</option>
								<option value="0412" <?php if($LineaS == "0412") echo "selected"; ?> >0412</option>
							</select>
						</div>
						<div class="col-sm-3">
							<input class="form-control" type="text" name="TelefonoS" id="TelefonoS" placeholder="Telefono Secundario" value = "<?php echo $TelefonoS;?>">
						</div>
					</div>

					<hr>
					<div class="form-group">
						<label for="Estado" class="col-sm-2">Estado:</label>
						<div class="col-sm-5">
							<select class="form-control" id="Estado" name="Estado">
								<option value = "0">---</option>
								<?php
									require("MYSQLphp.php");
									if($conex = Conectar("pruevassql")){
										$sql = "SELECT * FROM estados;";
										$result = $conex->query($sql);
										if($result)
											if($result->num_rows > 0){
												while ( $row = $result->fetch_assoc() ) {
													?>
													<option value = "<?php echo $row['EstadoID'];?>" <?php if( $Estado == $row['EstadoID'] ) echo 'selected';?> ><?php echo $row["Nombre"];?></option>
													<?php
												}
											}
											$conex->close();
									}else{
										die('Error');
									}
								?>
							</select>
							<p class="text-danger"><?php echo "*)",$EstadoErr; ?></p>
						</div>					
					</div>

					<div class="form-group">
						<label for="Municipio" class="col-sm-2">Munic&iacute;pio:</label>
						<div class="col-sm-5">
							<select class="form-control" id="Municipio" name="Municipio" disabled>
							<?php
									if($conex = Conectar("pruevassql")){
										if( $Municipio != 0){
											$sql = "SELECT MunicipioID, MunicipioNombre FROM municipio WHERE EstadoID = '".$Estado."';";
											$result = $conex->query($sql);
											if($result)
												if($result->num_rows > 0){
													while ( $row = $result->fetch_assoc() ) {
														?>
														<option value = "<?php echo $row['EstadoID'];?>" <?php if( $Municipio == $row['MunicipioID'] ) echo 'selected';?> ><?php echo $row["MunicipioNombre"];?></option>
														<?php
													}
												}
												$conex->close();
										}
										
									}else{
										die('Error');
									}
								?>
							</select>
							<p class="text-danger"><?php echo "*)",$MunicipioErr; ?></p>
						</div>					
					</div>
					<!--<br><label>Munic&iacute;pio:</label>
					<input type="text" name="Municipio" id="Municipio" placeholder = "Nombre del Municipio" value="<?php #echo $Municipio; ?>" required>
					-->
					<div class="form-group">
						<label for="Ciudad" class="col-sm-2">Ciud&aacute;d/Localidad:</label>
						<div class=" col-sm-6">
							<input class="form-control" type="text" name="Ciudad" id="Ciudad" placeholder = "Nombre de la Ciudad/Localidad" value="<?php echo $Ciudad;?>" required disabled>
							<p class="text-danger"><?php echo "*)",$CiudadErr; ?></p>
						</div>					
					</div>

					<div class="form-group">
						<label for="Direccion" class="col-sm-2">Direcci&oacute;n Completa:</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="Direccion" id="Direccion" rows="1" cols="50"><?php echo $Direccion; ?></textarea>
							<p class="text-danger"><?php echo "*)",$DireccionErr; ?></p>
						</div>			
					</div>
					<div class="form-group">
						<label for="Imagen" class="col-sm-2">Imagen:</label>
						<div class="col-sm-10">
							<input class="form-control" type="file" name="Imagen" id="Imagen" accept="image/*" required>	
							<p class="text-danger"><?php echo "*)",$ImagenErr; ?></p>				
							<br>					
							<img src="#" alt="Seleccione una imagen" id="ImgMostrar" style="border: 1px solid black; text-align: center;" class="img-rounded" width="250px" height="250px">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label for="Term" class="col-sm-2">Terminos y condiciones:</label>
						<div class="col-sm-6">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="Term" id="Term" value="Accept">He le&iacute;do y acepto los <a href="#">t&eacute;rminos y condiciones</a>	
								</label>						
							</div>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<div class="col-sm-2"></div>
						<div class="col-sm-10">
							<div class="btn-group">							
								<input class="btn btn-primary" type="submit" name="Enviar" id="Enviar" value="Enviar" disabled>
								<input class="btn btn-default" type="reset" name="reset" id="Reset" value="Borrar Todo">
								<a href="#" class="btn btn-default" role="button">Volver</a>
							</div>
						</div>
					</div>

				</form>
			</div>
		</div>
		<?php 
			if( !empty($pwdR) && !empty($Edad) && !empty($UserName) && !empty($NombreP) && !empty($Municipio) && !empty($Ciudad) && !empty($email) && !empty($Direccion) && !empty($pwd) && !empty($ApellidoP) && !empty($TelefonoP) && !empty($Estado) ){
				if($conex = Conectar("formulario") ){
					$sql = "SELECT * FROM cliente WHERE Cedula = '".$Cedula."';";
					$result = $conex->query($sql);
					if( $result && $result->num_rows > 0){
						?>
						<script type="text/javascript">
							alert('usuario ya registrado');
						</script>
						<?php
					}else{
						$sql = "INSERT INTO cliente (UserName, Password,Email, ".(!empty($Web)? "Web, ":"")."Nacionalidad, Cedula, NombreP, ".(!empty($NombreS)? "NombreS, ":"")."ApellidoP, ".(!empty($ApellidoS)? "ApellidoS, ":"" )."Edad, Sexo, TelefonoP, ".( !empty($TelefonoS)? "TelefonoS, ":"" )." EstadoID, MunicipioID, Ciudad, Direccion) VALUES ('".$conex->real_escape_string($UserName)."', '".$conex->real_escape_string($pwd)."', '".$conex->real_escape_string($email)."', '".(!empty($Web)? $conex->real_escape_string($Web)."', '":"").$conex->real_escape_string($Nacionalidad)."', ".$conex->real_escape_string($Cedula).", '".$conex->real_escape_string($NombreP)."', '".(!empty($NombreS)? $conex->real_escape_string($NombreS)."', '":"").$conex->real_escape_string($ApellidoP)."', ".(!empty($ApellidoS)? "'".$conex->real_escape_string($ApellidoS)."',":"" ).$conex->real_escape_string($Edad).", '".$conex->real_escape_string($Sexo)."', '".$conex->real_escape_string($LineaP.$TelefonoP)."', '".( !empty($TelefonoS)? $conex->real_escape_string($LineaS.$TelefonoS)."', '":"" ).$conex->real_escape_string($Estado)."', '".$conex->real_escape_string($Municipio)."', '".$conex->real_escape_string($Ciudad)."', '".$conex->real_escape_string($Direccion)."');";

						if($conex->query($sql) === TRUE){
							echo "Consulta bien realizada";
							$id = $conex->insert_id;
							$ruta = 'files/'.$id.'/';
							if( !file_exists($ruta)){
								mkdir($ruta);
							}
							$Archivo = $ruta.basename($_FILES["Imagen"]["name"]);
							if ( !move_uploaded_file($_FILES['Imagen']['tmp_name'], $Archivo) ) {
								?>
								<script type="text/javascript">
									alert('Hubo un Error al momento de subir el archivo' + $("#Imagen").val() );
								</script>
								<?php
							}
						}else{
							echo "pwd; [",$conex->real_escape_string($pwd),"] <br>";
							echo $sql,"<br>",$conex->error;
						}
					}	
				}

			}
		?>
	</body>
</html>