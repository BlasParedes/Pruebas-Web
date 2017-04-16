<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Principal</title>
		<script type="text/javascript">			
			function mover(elem){
				elem.style = "border: 1px solid red;";
			}
			function salir(elem){
				elem.style = "border: 1px solid white;";
			}
		</script>
	</head>
	<body>
		<?php
			include("libreria.php");
			if( isset($_GET["rec"]) ){
				unset($_SESSION["Mat"]);
				unset($_SESSION["Puntos"]);
				?>
				<script type="text/javascript">
					document.location="index.php?";
				</script>
				<?php
			}
			if(!isset($_SESSION["Mat"])){
				for ($i=0; $i < 10; $i++) { 
					for ($j=0; $j < 10; $j++) { 
						$mat[$i][$j] = rand(1,6);
					}
				}
				$_SESSION["Mat"] = $mat;
				$_SESSION["Puntos"] = 0;
			}else{
				$mat = $_SESSION["Mat"];
				if( isset($_GET["i"]) && isset($_GET["j"]) && isset($_GET["val"]) ){
					$i = $_GET["i"];
					$j = $_GET["j"];
					$cont = 0;
					$val = $_GET["val"];
					if( ($i+1 < 10 && $mat[$i+1][$j] == $val) || ($j+1 < 10 && $mat[$i][$j+1] == $val) || ($i-1 >= 0 && $mat[$i-1][$j] == $val) || ($j-1 >= 0 && $mat[$i][$j-1] == $val) ){
						$mat = Recursiva($i,$j,$mat,$val,$cont);
					}
					$mat = rellenar($mat);	
					$_SESSION["Puntos"] += $cont*($cont - 1);
					$_SESSION["Mat"] = $mat;
				}
			}
		?>
		<table>
			<?php
				for ($i=0; $i < 10; $i++) { 
					echo "<tr>";
					for ($j=0; $j < 10; $j++){
						?>
						<td><a href="index.php?i=<?php echo $i;?>&j=<?php echo $j;?>&val=<?php echo $mat[$i][$j];?>" ><img src='images/<?php echo $mat[$i][$j];?>.jpg' style = "border: 1px solid white;" onmouseout = "salir(this)" onmousemove = "mover(this)"></a></td>
						<?php
					}
					echo "</tr>";
				}
			?>
		</table>
		<?php
			if( Perdio($mat) ){
				?>
				<script type="text/javascript">
					var cont = confirm('Perdió, desea volver a jugar?');
					if(cont)
						document.location = 'index.php?rec=1';
				</script>
				<?php
			}
		?>
		<?php
			if( isset($_SESSION["Puntos"])){
				?>
				<p>Puntos: <?php echo $_SESSION["Puntos"];?></p>
				<?php
			}
		?>
		<input type="button" name="boton" value = "Recargar" onclick="document.location = 'index.php?rec=1'">
	</body>
</html>