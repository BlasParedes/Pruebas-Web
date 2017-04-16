<?php
	session_start();
	if( !isset($_SESSION["Cuenta"]) || !isset($_SESSION["Usuario"]) || !isset($_SESSION["Cedula"])){
		?>
			<script type="text/javascript">
				document.location = "/Proyecto2016/index.php";
			</script>
		<?php
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Alcald&iacute;a de San Crist&oacute;bal</title>
		<?php require "head.html";
			require "cabezera.php";
			CabezeraSI("Sintomas");
			require "MYSQLphp.php";
		?>
		<script type="text/javascript">
	//este es script de la barra de progreso de la contraseña
			$(document).ready(function(){
				$("#Diagnosticado").change(function(){
					var tamPwd = $("#Diagnosticado").val();
					if(tamPwd == "Si"){					
						$("#Enfermedad").attr("disabled",false);
					}else{
						$("#Enfermedad").val("Ninguna");
						$("#Enfermedad").attr("disabled",true);
					}	
				});
			});
		</script>
	</head>
	<body>
	<?php
		if(isset($_GET["cln"])){
			$link = Conectar("proyecto2016");
			if(BorrarElemento("Cedula",$_SESSION["Cedula"],"enfermedades",$link)){
				$link->close();
				?>
				<script>
					document.location = "Sintomas.php";
				</script>
				<?php
			}
		}
		$error = "";
		if( isset($_POST["Diagnosticado"]) && isset($_POST["Cabeza"]) && isset($_POST["Fiebre"]) && isset($_POST["Erupciones"]) && isset($_POST["Musculos"]) && isset($_POST["Conjuntivitis"]) && isset($_POST["Vomitos"]) && isset($_POST["Otros"])){
			$Diagnosticado = $_POST["Diagnosticado"];
			if($Diagnosticado == "Si"){
				$Enfermedad = $_POST["Enfermedad"];
			}
			$Cabeza = $_POST["Cabeza"];
			$Fiebre = $_POST["Fiebre"];
			$Erupciones = $_POST["Erupciones"];
			$Musculos = $_POST["Musculos"];
			$Conjuntivitis = $_POST["Conjuntivitis"];
			$Vomitos = $_POST["Vomitos"];
			$Otros = $_POST["Otros"];
			if (!preg_match("/^[a-zA-Z0-9,.;' ]*$/", $Otros)) {
				$error = "Unicamente letras y numeros";
				$Otros = "";
			}
			echo $Diagnosticado," ",$Enfermedad," ",$Cabeza," ",$Fiebre," ",$Erupciones," ",$Musculos," ",$Conjuntivitis," ",$Vomitos," ",$Otros;			
		}
		if($link = Conectar("proyecto2016")){
			if(!Buscar("Cedula",$_SESSION["Cedula"],"enfermedades",$link)){
	?>
		<br><br><br>
		<div class="container">
			<div id="panel">
				<br>
				<div class = "row">
					<div class = "col-sm-2"></div>
			 		<div class = "col-sm-8">
				 		<h1>Ingrese sus sintomas</h1>
			 		</div>
				</div>

				<form class="form-horizontal" method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form-group">
						<label class="control-label col-sm-2">Nombre:</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="nombre" value = "<?php echo $_SESSION['Usuario'];?>" disabled>
						</div>
						<label class="control-label col-sm-1">Cedula:</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="cedula" value = "<?php echo $_SESSION['Nacionalidad'],"-",$_SESSION['Cedula'];?>" disabled>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Ha sido Diagnosticado?:</label>
						<div class="col-sm-2">
							<select name="Diagnosticado" id="Diagnosticado" class = "form-control">
						      	<option value = 'Si'>Si</option>
						      	<option value = 'No' selected>No</option>
						      </select> 
						</div>
						<label class="control-label col-sm-2">Enfermedad:</label>
						<div class="col-sm-2">							
							<select name="Enfermedad" id="Enfermedad" class = "form-control" disabled>
								<option value = 'Ninguna'>Ninguna</option>
						      	<option value = 'Chikungunya'>Chikungunya</option>
						      	<option value = 'Dengue'>Dengue</option>
						      	<option value = 'Zika'>Zika</option>
						      </select> 
						      <p>(Solo si fue atendido)</p>
						</div>						
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Dolor de Cabeza:</label>
						<div class="col-sm-2">							
							<label class="radio-inline">
						      	<input type="radio" name="Cabeza" value = "Si">Si
						    </label>
						    <label class="radio-inline">
						      	<input type="radio" name="Cabeza" value="No" checked>No
						    </label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Fiebre:</label>
						<div class="col-sm-2">							
							<label class="radio-inline">
						      	<input type="radio" name="Fiebre" value = "Si">Si
						    </label>
						    <label class="radio-inline">
						      	<input type="radio" name="Fiebre" value="No" checked>No
						    </label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Erupciones en la piel:</label>
						<div class="col-sm-2">							
							<label class="radio-inline">
						      	<input type="radio" name="Erupciones" value = "Si">Si
						    </label>
						    <label class="radio-inline">
						      	<input type="radio" name="Erupciones" value="No" checked>No
						    </label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Dolores Musculares:</label>
						<div class="col-sm-2">							
							<label class="radio-inline">
						      	<input type="radio" name="Musculos" value = "Si">Si
						    </label>
						    <label class="radio-inline">
						      	<input type="radio" name="Musculos" value="No" checked>No
						    </label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Conjuntivitis:</label>
						<div class="col-sm-2">							
							<label class="radio-inline">
						      	<input type="radio" name="Conjuntivitis" value = "Si">Si
						    </label>
						    <label class="radio-inline">
						      	<input type="radio" name="Conjuntivitis" value="No" checked>No
						    </label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Vomitos:</label>
						<div class="col-sm-2">							
							<label class="radio-inline">
						      	<input type="radio" name="Vomitos" value = "Si">Si
						    </label>
						    <label class="radio-inline">
						      	<input type="radio" name="Vomitos" value="No" checked>No
						    </label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for = "comment">Otros S&iacute;ntomas:</label>
						<div class="col-sm-6">							
							<textarea class="form-control" rows = "5" name = "Otros" id="Otros" placeholder="Ingrese otros sintomas presentados, en caso de no presentar mas sintomas deje el espacio en blanco"></textarea>
							<p class = "text-danger"> <?php echo $error;?></p>
						</div>

					</div>
					<div class="form-group">
					    <label class="control-label col-sm-4"></label>
					    <div class="btn-group">
					      	<button type="submit" class="btn btn-default" id = "Enviar">Enviar</button>
					      	<a href="/Proyecto2016/SesionIniciada.php" class = " btn btn-default" role = "button">Regresar</a>
					    </div>
					</div>
				</form>

			</div>
		</div>
		<?php
			if( isset($_POST["Diagnosticado"]) && isset($_POST["Cabeza"]) && isset($_POST["Fiebre"]) && isset($_POST["Erupciones"]) && isset($_POST["Musculos"]) && isset($_POST["Conjuntivitis"]) && isset($_POST["Vomitos"]) && isset($_POST["Otros"]) && $error==""){
				if(!Buscar("Cedula",$_SESSION["Cedula"],"enfermedades",$link)){
					if($Diagnosticado == "Si"){
						$array = array($_SESSION["Nombre"],$_SESSION["Nacionalidad"],$_SESSION["Cedula"],$Diagnosticado,$Enfermedad,$Cabeza,$Fiebre,$Erupciones,$Musculos,$Conjuntivitis,$Vomitos,$Otros);
						$Valores = array("Nombre","Nacionalidad","Cedula","Diagnostico","Enfermedad","Cabeza","Fiebre","Erupciones","Musculos","Conjuntivitis","Vomitos","Otros");
					}else{
						$array = array($_SESSION["Nombre"],$_SESSION["Nacionalidad"],$_SESSION["Cedula"],$Diagnosticado,$Cabeza,$Fiebre,$Erupciones,$Musculos,$Conjuntivitis,$Vomitos,$Otros);
						$Valores = array("Nombre","Nacionalidad","Cedula","Diagnostico","Cabeza","Fiebre","Erupciones","Musculos","Conjuntivitis","Vomitos","Otros");
					}
					echo $array;
					if(AgregarDatos($Valores,$array,"enfermedades",$link)){
						?>
						<script type="text/javascript">
							alert('Se han guardado bien los datos');
							document.location = "SesionIniciada.php";
						</script>
						<?php
					}else{
						?>
						<script type="text/javascript">
							alert('Hubo un error al momento de cargar');
						</script>
						<?php
					}
				}
		}
		}else{
			?>
			<div class="container">
			<br><br><br>
			  <div class="jumbotron">
			    <h1>S&iacute;ntomas registrados</h1>      
			    <p>Estimado usuario, usted ya ha registrado s&iacute;ntomas</p>
			    <p>Si desea puede volver a registrar sus s&iacute;ntomas</p>
				<input type = "button" value="Volver a ingresar s&iacute;ntomas" class="btn btn-default" onclick="document.location = 'Sintomas.php?cln=1'"/>
			  </div>     
			</div>
			<?php
		}
	}else{
		?>
		<script type="text/javascript">
			alert('Error al conectar a la base de datos');
		</script>
		<?php
	}
		?>
				<?php include("footer.php");
?>
	</body>
</html>