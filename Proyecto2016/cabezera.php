
		<?php
		 function Cabezera($activo){
		 	$Error = "";
			 ?><nav class='navbar navbar-inverse navbar-fixed-top'>
			 			  <div class='container-fluid'>
			 			    <div class='navbar-header'>
			 
			 			      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
			 			        <span class='icon-bar'></span>
			 			        <span class='icon-bar'></span>
			 			        <span class='icon-bar'></span>
			 			      </button>
			 
			 			      <a class='navbar-brand' href='http://www.alcaldiadesancristobal.com'>Alcaldia de San Crist&oacute;bal</a>
			 			    </div>
			 			    <div class='collapse navbar-collapse' id='myNavbar'>
			 			      <ul class='nav navbar-nav'>
			 			        <li <?php echo $activo === "Principal"? "class = 'active'":"";?> ><a href='/Proyecto2016/index.php'>Principal</a></li>	
			 			      </ul>
			 			      <ul class='nav navbar-nav navbar-right'>
			 			        <li>
			 			        <a href='#'></a>
			 			        </li>
			 			        <li class='dropdown'>
			 	        		 	<a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class='glyphicon glyphicon-user'></span> Iniciar Sesici&oacute;n</a>        		 	
			 	        		 		<ul class='dropdown-menu' width = '200' style='background-color: #333'>
			 					          <li>
			 						          <form class = 'form-inline' method = 'post' action = 'inicio.php'>
			 						          	<div class = 'form-group'>
			 						          		<label for = 'email'><font color = 'white'>Correo Electronico: </font></label>
			 						          		<input type='email' class = 'form-control' name='email'>
			 						          	</div>
			 						          	<div class = 'form-group'>
			 						          		<label for = 'pwd'><font color = 'white'>Contrase&ntildea: </font></label>
			 						          		<input type='password' class = 'form-control' name='pwd'>
			 						          	</div>
			 						          	<div class = 'form-group'>
			 						          		<p class = 'text-default'><font color = 'white'><?php echo $Error;?></font></p>
			 						          	</div>
			 						          	<hr>
			 						          	<button type='submit' class='btn btn-primary'>Ingresar</button>
			 						          </form>
			 					          </li>				          
			 					        </ul>
			 	        		 				        
			 				     </li>
			 			        <li <?php echo $activo === "Login"? "class = 'active'":"";?>><a href='/Proyecto2016/Formulario.php'><span class='glyphicon glyphicon-log-in'></span> Crear cuenta</a></li>
			 			      </ul>
			 			    </div>
			 			  </div>
			 			</nav>";
			 			<?php
		}
		function CabezeraSI($activo){
		 	$Error = "";
			 ?><nav class='navbar navbar-inverse navbar-fixed-top'>
			 			  <div class='container-fluid'>
			 			    <div class='navbar-header'>
			 
			 			      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
			 			        <span class='icon-bar'></span>
			 			        <span class='icon-bar'></span>
			 			        <span class='icon-bar'></span>
			 			      </button>
			 
			 			      <a class='navbar-brand' href='http://www.alcaldiadesancristobal.com'>Alcaldia de San Crist&oacute;bal</a>
			 			    </div>
			 			    <div class='collapse navbar-collapse' id='myNavbar'>
			 			      <ul class='nav navbar-nav'>			 			  
			 			      <?php
			 			      	if($_SESSION["Cuenta"] == 1){
			 			      ?>      
			 			      <li <?php echo $activo === "Principal"? "class = 'active'":"";?> ><a href='Sistema.php'><?php echo $_SESSION["Usuario"];?></a></li>

			 			     ?><?php 
			 			 		}else{
			 			      ?>		 			        	
			 			        <li <?php echo $activo === "Principal"? "class = 'active'":"";?> ><a href='SesionIniciada.php'><?php echo $_SESSION["Usuario"]," ",$_SESSION["Nacionalidad"],"-",$_SESSION["Cedula"];?></a></li>
			 			        <?php
			 			    		} 
			 			    		if($_SESSION["Cuenta"] == 2){?>

			 			        	<li <?php echo $activo === "Notificaciones"? "class = 'active'":"";?>><a href='UsuarioNotificaciones.php'>Notificaciones y Noticias</a></li>	
			 			        	
			 			        	<li <?php echo $activo === "Sintomas"? "class = 'active'":"";?>><a href='Sintomas.php'>Ingresar Sintomas</a></li>	

			 			      	<?php 
			 			      		}else{
	 			      			?>
	 			      				<li <?php echo $activo === "VerUsuarios"? "class = 'active'":"";?>><a href='VerUsuarios.php'>Consultar Usuario</a></li>	
	 			      				<li <?php echo $activo === "Mensajes"? "class = 'active'":"";?>><a href='Mensajes.php'>Dejar Mensajes o Notificaciones</a></li>	
	 			      				<li class='dropdown'>
			 	        		 	<a class='dropdown-toggle' data-toggle='dropdown' href='#'> Reportes</a>	
			 	        		 		<ul class='dropdown-menu' width = '200'>
			 					          <li><a href="RepEnfermedades.php">Reporte de Enfermedades</a></li>
			 					          <li><a href="RepSintomas.php">Reporte de Sintomas</a></li>				          
			 					        </ul>			        
			 				     </li>
	 			      			<?php
			 			      		}
			 			      	?>			 			      	
			 			      </ul>	
			 			      <ul class='nav navbar-nav navbar-right'>
			 			      	<li><a href='/Proyecto2016/CerrarSesion.php'><span class='glyphicon glyphicon-log-out'></span> Salir</a></li>
			 			      </ul>		 			      
			 			    </div>
			 			  </div>
			 			</nav>";
			 			<?php
		}
		?>

