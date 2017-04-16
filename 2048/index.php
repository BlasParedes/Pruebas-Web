<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>2048</title>
		<script type="text/javascript">
			window.onload = function(){
				document.onkeydown = Presionar;
			}
			function Presionar(event){
				var tecla = event.keyCode;
				switch(tecla){
					case 38:
						document.location = "index.php?tecla=Up";
						break;
					case 40:
						document.location = "index.php?tecla=Down";
						break;
					case 37:
						document.location = "index.php?tecla=Left";
						break;
					case 39:
						document.location = "index.php?tecla=Right";
						break;
				}
			}
			function Rewind() {
				document.location = "index.php?rwd=1";
			}
		</script>
	</head>
	<body>
		<?php
			include("libreria.php");
			if( isset($_GET["rwd"])){
				unset($_SESSION["Mat"]);
				unset($_SESSION["Puntos"]);
			}

			if( !isset($_SESSION["Mat"])){
				for ($i=0; $i < 4; $i++) { 					
					for ($j=0; $j < 4; $j++) { 
						$mat[$i][$j] = 0;
					}
				}
				for ($i=0; $i < 2; $i++) {
					$x = $y = 0; 
					do{
						$x = rand(0,3);
						$y = rand(0,3);
					}while( $mat[$x][$y] != 0);
					$mat[$x][$y] = 2;
				}
				$_SESSION["Puntos"] = 0;
				$_SESSION["Mat"] = $mat;
			}else{
				$mat = $_SESSION["Mat"];
			}
			if( isset($_GET["tecla"]) && isset($_SESSION["Mat"]) ){
				$tecla = $_GET["tecla"];
				$band = false;
				if($tecla == "Up"){
					for ($i=0; $i < 4; $i++) { 
						for ($j=1; $j < 4; $j++) { 
							if($mat[$j][$i] != 0){
								if( ($pos = RevArriba($j,$i,$mat)) == -1){
									$pos = sumarArriba($j,$i,$mat);									
									if($pos != $j){
										$_SESSION["Puntos"] += $mat[$pos][$i];
										$mat[$pos][$i] *= 2;
										$mat[$j][$i] = 0;
										$band = true;
									}
								}else{
									$mat[$pos][$i] = $mat[$j][$i];
									if($pos != $j){
										$mat[$j][$i] = 0;
										$band = true;
									}
								}								
							}
						}
					}
				}elseif ($tecla == "Down") {
					for ($i=0; $i < 4; $i++) { 
						for ($j=2; $j >= 0; $j--) { 
							if($mat[$j][$i] != 0){
								if( ($pos = RevAbajo($j,$i,$mat)) == -1){
									$pos = sumarAbajo($j,$i,$mat);									
									if($pos != $j){
										$_SESSION["Puntos"] += $mat[$pos][$i];
										$mat[$pos][$i] *= 2;
										$mat[$j][$i] = 0;
										$band = true;
									}
								}else{
									$mat[$pos][$i] = $mat[$j][$i];
									if($pos != $j){
										$mat[$j][$i] = 0;
										$band = true;
									}
								}								
							}
						}
					}
				}elseif ($tecla == "Left") {
					for ($i=0; $i < 4; $i++) { 
						for ($j=1; $j < 4; $j++) { 
							if($mat[$i][$j] != 0){
								if( ($pos = RevIzquierda($i,$j,$mat)) == -1){
									$pos = sumarIzquierda($i,$j,$mat);									
									if($pos != $j){
										$_SESSION["Puntos"] += $mat[$i][$pos];
										$mat[$i][$pos] *= 2;
										$mat[$i][$j] = 0;
										$band = true;
									}
								}else{
									$mat[$i][$pos] = $mat[$i][$j];
									if($pos != $j){
										$mat[$i][$j] = 0;
										$band = true;
									}
								}									
							}
						}
					}
				}else {
					for ($i=0; $i < 4; $i++) { 
						for ($j=2; $j >= 0; $j--) { 
							if($mat[$i][$j] != 0){
								if( ($pos = RevDerecha($i,$j,$mat)) == -1){
									$pos = sumarDerecha($i,$j,$mat);									
									if($pos != $j){
										$_SESSION["Puntos"] += $mat[$i][$pos];
										$mat[$i][$pos] *= 2;
										$mat[$i][$j] = 0;
										$band = true;
									}
								}else{
									$mat[$i][$pos] = $mat[$i][$j];
									if($pos != $j){
										$mat[$i][$j] = 0;
										$band = true;
									}	
								}
								
							}
						}
					}
				}
				if($band == true){
					do{
						$x = rand(0,3);
						$y = rand(0,3);
					}while( $mat[$x][$y] != 0);
					$mat[$x][$y] = 2;
				}				
				$_SESSION["Mat"] = $mat;
			}
		?>
		<h1><font color="white" style="background-color: black; border-radius: 5px; padding-left: 
		200px; padding-right: 190px;">2048</font></h1>
		<p>Puntos: <?php echo $_SESSION["Puntos"]?></p>
		<table>
			<?php
			$band = false;
				for ($i=0; $i < 4; $i++) { 
					echo "<tr>";
					for ($j=0; $j < 4; $j++) { 
						echo "<td><a><img src = 'img/",$mat[$i][$j],".png'></a></td>";
						if($mat[$i][$j] == 2048)
							$band = true;
					}
					echo "</tr>";
				}
			?>				
		</table>			
			<?php
				if($band == true){
					?>
					<script type="text/javascript">
						var resp = confirm('Ganó, Su puntaje es '+<?php echo $_SESSION["Puntos"]?>+'\n desea volver a jugar?');
						if(resp) 
							Rewind();
					</script>
					<?php
				}
				if(perdio($mat)){
					?>
					<script type="text/javascript">
					var resp = confirm('Perdió, Su puntaje es '+<?php echo $_SESSION["Puntos"]?>+'\n desea volver a jugar?');
						if(resp) 
							Rewind();</script>
					<?php
				}
			?>
		
		<input type="button" name="rwd" value="Nuevo Juego" onclick="Rewind()">
	</body>
</html>