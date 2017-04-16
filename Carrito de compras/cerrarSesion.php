<?php
	session_start();
	unset($_SESSION["carrito"]);
	session_unset();
	?>
		<script type="text/javascript">
			document.location = "index.php";
		</script>
	<?php
?>