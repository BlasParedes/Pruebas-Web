<!DOCTYPE html>
<html>
	<head>
		<meta lang="es">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">    
		<link rel="stylesheet" type="text/css" href="custom.css">
		<script src="jquery-3.1.0/jquery-3.1.0.js"></script>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="jquery-ui-1.12.0/jquery-ui.css">    
		<script src="jquery-ui-1.12.0/jquery-ui.js"></script>	
		<title>Tabla Amortizacion</title>
	</head>
	<body>
		<div class="container">
			<br><br><br>
			<form method="post" class="form-inline">
				<div class="form-group">
					Capital a amortizar: <input type="text" name="CapPendiente">
				</div>
				<div class="form-group">
					Interes: <input type="text" name="i">
				</div>
				<div class="form-group">
					No de Periodos: <input type="text" name="n">
				</div>
				<input type="submit" name="enviar" value="enviar" class="btn btn-primary">
			</form>
		
			<br><br><br>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Periodo</th>
						<th>Capital Pendiente</th>
						<th>Cuota</th>
						<th>Interes</th>
						<th>Amort. de Capital</th>
						<th>Capital al Final</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				if ( isset($_POST["CapPendiente"]) && isset($_POST["i"]) && isset($_POST["n"]) ) {
					$CapPendiente = $_POST["CapPendiente"];
					$i = $_POST["i"];
					$n = $_POST["n"];
						if( is_numeric($CapPendiente) && is_numeric($i) && is_integer($n) ){
							$Cuota = $CapPendiente*( ( ($i/100) * pow( 1 + ($i/100) , $n ) ) / ( pow( 1 + ($i/100) , $n ) - 1 ) );
							for ($j=0; $j < $n; $j++) { 
								echo "<tr>";
								$band = $CapPendiente - ( $Cuota - $CapPendiente*($i/100) );
								?>

					<td><?php echo $j+1; ?></td>
					<td><?php echo round($CapPendiente,3); ?></td>
					<td><?php echo round($Cuota,3); ?></td>
					<td><?php echo round($CapPendiente*($i/100),3); ?></td>
					<td><?php echo round($Cuota - $CapPendiente*($i/100),3); ?></td>
					<td><?php echo round($band,3); ?></td>

								<?php
								echo "</tr>";
								$CapPendiente = $band;
							}
						}
					}
				?>	
				</tbody>				
			</table>
		</div>	
	</body>
</html>