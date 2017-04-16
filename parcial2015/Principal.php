<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Principal</title>
		<script type="text/javascript">
			function llamar(i,j,val){
				document.location = "Principal.php?i="+i+"&j="+j+"&val="+val;
			}
			function recargar(){
				document.location = "Principal.php?rec=1";
			}
		</script>
	</head>
	<body>
		<?php
			include("libreria.php");
			if( isset($_GET["rec"]) )
				unset($_SESSION["Mat"]);
			if(!isset($_SESSION["Mat"])){
				for ($i=0; $i < 10; $i++) { 
					for ($j=0; $j < 10; $j++) { 
						$mat[$i][$j] = rand(1,6);
					}
				}
				$_SESSION["Mat"] = $mat;
			}else{
				$mat = $_SESSION["Mat"];
				if( isset($_GET["i"]) && isset($_GET["j"]) && isset($_GET["val"]) ){
					$i = $_GET["i"];
					$j = $_GET["j"];
					$val = $_GET["val"];
					if( ($i+1 < 10 && $mat[$i+1][$j] == $val) || ($j+1 < 10 && $mat[$i][$j+1] == $val) || ($i-1 >= 0 && $mat[$i-1][$j] == $val) || ($j-1 >= 0 && $mat[$i][$j-1] == $val) ){
						$mat = Recursiva($i,$j,$mat,$val);
					}
					$mat = rellenar($mat);	
					$_SESSION["Mat"] = $mat;
				}
			}
		?>
		<table>
			<?php
				for ($i=0; $i < 10; $i++) { 
					echo "<tr>";
					for ($j=0; $j < 10; $j++) { 
						echo "<td><a onclick = 'llamar(",$i,",",$j,",",$mat[$i][$j],")'><img src='images/",$mat[$i][$j],".jpg'></a></td>";
					}
					echo "</tr>";
				}
			?>
		</table>
		<input type="button" name="boton" value = "Recargar" onclick="recargar()">
	</body>
</html>