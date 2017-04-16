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
			CabezeraSI("Principal");
			require "MYSQLphp.php";
		?>
	</head>
	<body>
		<?php if(($link = Conectar("proyecto2016")) != null){ ?>
		<div class="container">
			<br><br><br>
			<div id="panel">
				<h1>Reporte de Enfermedades</h1>
			</div>
			<br><hr>
				<ul class="list-group">
					<li class="list-group-item">
						Personas con Dengue: <?php 
							echo nResultados("Enfermedad","Dengue","enfermedades",$link);
						?>
					</li>
					<li class="list-group-item">
						Personas con Chikungunya: <?php
							echo nResultados("Enfermedad","Chikungunya","enfermedades",$link);
						?>
					</li>
					<li class="list-group-item">
						Personas con Zika: <?php
							echo nResultados("Enfermedad","Zika","enfermedades",$link);
						?>
					</li>
				</ul>
		</div>
		<?php }else{
			?>
			<script>alert('No se pudo conectar a la base de datos');</script>
			<?php
		} ?>
				<?php include("footer.php");
?>
	</body>
</html>