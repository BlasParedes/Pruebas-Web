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
			CabezeraSI("Notificaciones");
			require "MYSQLphp.php";
		?>
	</head>
	<body>
		<div class="container">
			<br><br><br>
			<div id="notificaciones" style="margin-left: 260px; margin-right: 260px;">
				<?php 
					if($link = Conectar("proyecto2016")){
						ImprimirNoticias("notificaciones",$link);
						
					}
				?>
			</div>
		</div>
				<?php include("footer.php");
?>
	</body>
</html>