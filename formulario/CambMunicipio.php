<?php
	if( isset($_POST["Estado"]) ){
		require('MYSQLphp.php');
		if( $conex = Conectar('pruevassql') ){
			$Estado = $_POST["Estado"];
			$sql = "SELECT MunicipioID, MunicipioNombre FROM municipio WHERE EstadoID = '".$Estado."';";
			$result = $conex->query($sql);
			if($result)
				if( $result->num_rows > 0 ){
					?>
					<option value="0">---</option>
					<?php
					while ( $row = $result->fetch_assoc() ) {
						?>
						<option value="<?php echo $row['MunicipioID']; ?>"><?php echo $row['MunicipioNombre']; ?></option>
						<?php
					}
				}
			$conex->close();
		}else{
			die('Hubo un error en esta piedra');
		}
	}
?>