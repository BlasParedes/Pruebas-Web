<?php
	session_start();
	if( !isset($_SESSION["Cuenta"]) || !isset($_SESSION["Usuario"]) || !isset($_SESSION["Cedula"])){
		?>
			<script type="text/javascript">
				document.location = "/Proyecto2016/index.php"
			</script>
		<?php
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta lang="es">
		<title>Sistema, Alcald&iacute;a</title>
		<?php require "head.html";
			require "cabezera.php";
			CabezeraSI("VerUsuarios");
			require "MYSQLphp.php";
		?>
	</head>
	<body>
		<div class="container">
			<br><br><br>
			<div id="panel">
				<form class="form-horizontal" style=" text-align: center;" method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<br>
					<h2>Ingrese la cedula del usuario que desea buscar</h2>
					<div class="form-group">
					    <label style="margin-left: 200px;" class="control-label col-sm-2">C&eacute;dula:</label>
					    <div class="col-sm-1">
					      <select name="Nacionalidad" class = "form-control">
					      	<option value = 'V'>V</option>
					      	<option value = 'E'>E</option>
					      </select> 
					    </div>
					    <div class="col-sm-3">
					      <input type="text" class="form-control" name="Cedula" placeholder="Introduzca su cedula, si es menor de edad Introduzca la de su representante" required>
					    </div>
			  		</div>
			  		<div class="form-group" style="margin-right: 300px;">
					    <label class="control-label col-sm-4"></label>
					    <div class="btn-group">
					      <button type="submit" class="btn btn-default" name = "Buscar" id = "Buscar">Buscar</button>
					      <a href="Sistema.php" class = " btn btn-default" role = "button">Regresar</a>
					    </div>
					</div>
				</form>
			</div>	
		<?php
			if( isset($_POST["Buscar"])){
				if(isset($_POST["Cedula"]) && is_numeric($_POST["Cedula"])){
					if ($link = Conectar("proyecto2016")) {
						?>
						<br><hr>
						<h2>Datos del usuario</h2>
						<ul class="list-group">
						<?php
						$sql = "SELECT * FROM usuarios WHERE Cedula=".$_POST["Cedula"];
						$result = $link->query($sql);
						if ($result->num_rows != 0) {
							$row = $result->fetch_assoc();
							foreach ($row as $key => $value) {
								if(($key != "Password"  && $key != "Movil")|| ($key == "Movil" && $value !="0")){
									?>
									<li class="list-group-item"><?php echo $key,": ",$value;?></li>
									<?php
								}
							}
							$sql = "SELECT * FROM enfermedades WHERE Cedula=".$_POST["Cedula"];
							$result = $link->query($sql);
							if($result->num_rows != 0){
								$row = $result->fetch_assoc();
								foreach ($row as $key => $value) {
									if($key != "Nombre" && $key != "Cedula" && $key != "Nacionalidad"){
										?>
										<li class="list-group-item"><?php echo $key,": ",$value;?></li>
										<?php
									}
								}

							}else{
								?>
								<li class="list-group-item">No ha ingresado datos de enfermedades.</li>
								<?php
							}
						}else{
							?><script>
								alert("Usuario no encontrado.");
								document.location = "VerUsuarios.php";
							</script><?php
						}
						?>
						</ul>
						<?php
					}
				}else{
					?>
					<script>
						alert('Debe ingresar una cedula valida');
						document.location = "VarUsuarios.php";
					</script>
					<?php
				}
			}
		?>
		</div>
				<?php include("footer.php");
?>
	</body>
</html>