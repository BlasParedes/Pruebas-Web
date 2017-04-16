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
		<title>Sistema, Alcald&iacute;a</title>
		<?php require "head.html";
			require "cabezera.php";
			CabezeraSI("Mensajes");
			require "MYSQLphp.php";
		?>
	</head>
	<body>
		<div class="container">
			<br><br><br>
			<div id="panel">
				<br>
			 	<div class = "row">
			 		<div class = "col-sm-2"></div>
			 		<div class = "col-sm-8">
				 		<h1>Env&iacute;o de Mensajes o Notificaciones</h1>
			 		</div>
			 	</div>		 		 
			 	<form class="form-horizontal" method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				 	<div class="form-group">
						 <label class="control-label col-sm-2">Tipo: </label>
					    <div class="col-sm-3">
					      <select name="Tipo" class = "form-control">
					      	<option value = 'Noticia'>Noticia</option>
					      	<option value = 'Notificacion'>Notificaci&oacute;n</option>
					      </select> 
					    </div>
				 	</div>
				 	<div class="form-group">
					    <label class="control-label col-sm-2">Titulo:</label>
					    <div class="col-sm-2">
					      <input type="text" class="form-control" name="Titulo" placeholder="Introduzca el titulo del Mensaje" required>
					    </div>
					</div>
				 	<div class="form-group">
						<label class="control-label col-sm-2" for = "comment">Texto:</label>
						<div class="col-sm-6">							
							<textarea class="form-control" rows = "5" name ="Mensaje" id="Mensaje" placeholder="Ingrese el texto a enviar."></textarea>
						</div>
					</div>
				 	<div class="form-group">
				      <label class="control-label col-sm-4"></label>
				      <div class="btn-group">
				        <button type="submit" class="btn btn-default" name="Enviar" id = "Enviar">Enviar</button>
				        <a href="Sistema.php" class = " btn btn-default" role = "button">Regresar</a>
				      </div>
				    </div>
				</form>	
			</div>
		</div>
		<?php
			if(isset($_POST["Enviar"])){
				if(!empty($_POST["Titulo"]) && !empty($_POST["Mensaje"])){
					if ($link = Conectar("proyecto2016")) {
						$array = array($_POST["Tipo"],$_POST["Titulo"],$_POST["Mensaje"]);
						$campos = array("Tipo","Titulo","Mensaje");
						if (AgregarDatos($campos,$array,"notificaciones",$link)) {
							?>
								<script>
									alert("Mensaje Enviado");
									document.location = "Sistema.php";
								</script>
							<?php
						}else{
							?>
							<script>
								alert("Error al enviar Mensaje");
								document.location = "Mensajes.php";
							</script>
							<?php
						}
					}
				}
			}
		?>
				<?php include("footer.php");
?>
	</body>
</html>