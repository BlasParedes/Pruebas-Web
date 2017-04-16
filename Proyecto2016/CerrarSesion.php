<?php
	session_start();
	unset($_SESSION["Cuenta"]);
	unset($_SESSION["Usuario"]);
	unset($_SESSION["Nacionalidad"]);
	unset($_SESSION["Cedula"]);
	session_unset();
	?>
		<script type="text/javascript">
			document.location = "index.php";
		</script>
	<?php
?>