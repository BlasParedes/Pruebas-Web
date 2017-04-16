<?php
	function Conectar($DataBase){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = new mysqli($servername,$username,$password,$DataBase);
		if($conn->connect_error)
			return null;
		return $conn;
	}
	function nResultados($campo,$value,$tabla,$link){
		$sql = "SELECT * FROM ".$tabla." WHERE ".$campo."='".$value."'";
		$result = $link->query($sql);
		if($result)
			$bandera = $result->num_rows;
		else
			$bandera = 0;
		return $bandera; 
	}
	function AgregarDatos($valores,$array,$tabla,$link){
		$sql = "INSERT INTO ".$tabla." (";
		for($i = 0;$i<count($valores);$i++){
			$sql .= $valores[$i];
			if($i != count($valores)-1)
				$sql .= ",";
		}
		$sql .= ") VALUES (";
		for($i = 0;$i < count($array);$i++){
			$sql .= "'".$array[$i]."'";
			if($i != count($array)-1)
				$sql .= ",";
		}
		$sql .= ")";
		if($link->query($sql))
			return true;
		return false;
	}
	function Buscar($clave,$elem,$tabla,$link){
		$sql = "SELECT * FROM ".$tabla." WHERE ".$clave."=".$elem;
		$result = $link->query($sql);
		if($result)
		if($result->num_rows != 0)
			return true;
		return false;
	}
	function ImprimirTabla($array,$tabla,$link){
		$sql = "SELECT ";
		for($i = 0;$i < count($array);$i++){
			$sql .= " ".$array[$i];
			if($i != count($array)-1)
				$sql .= ",";
		}
		$sql .= " FROM ".$tabla;
		$result = $link->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo "<p>";
				foreach ($row as $key => $value) {
					echo $key.": ".$value;
				}
				echo "</p>";
			}
		}else{
			echo "0 Resultados";
		}
	}
	function ImprimirNoticias($tabla,$link){
		$sql = "SELECT * FROM ".$tabla."";
		$result = $link->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				?>
				<div class="well" style="background-color: #71B8FF;">
				<div class="row">
					<div class="col-sm-5"><h2>T&iacute;tulo: <?php echo $row["Titulo"];?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">Tipo: <?php echo $row["Tipo"];?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12"><pre><?php echo $row["Mensaje"];?></pre>
					</div>
				</div>
				</div>
				<br> 
				<?php
			}
		}else{
			?><script>alert('No hay mensajes');</script> 
			<?php
			
		}
		return $result;
	}
	function BorrarElemento($clave,$campo,$tabla,$link){
		$sql = "DELETE FROM ".$tabla." WHERE ".$clave."=".$campo;
		if($link->query($sql))
			return true;
		return false;
	}
	function ActualizarData($claveCambio,$campoCambio,$claveControl,$campoControl,$tabla,$link){
		$sql = "UPDATE ".$tabla." SET ".$claveCambio."='".$campoCambio."' WHERE ".$claveControl."=".$campoControl;
		if($link->query($sql))
			return true;
		return false;
	}
?>