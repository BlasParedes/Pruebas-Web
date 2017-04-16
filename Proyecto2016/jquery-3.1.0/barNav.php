	<?php
		echo "<nav class='navbar navbar-inverse'>
		  <div class='container-fluid'>
		    <div class='navbar-header'>

		      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
		        <span class='icon-bar'></span>
		        <span class='icon-bar'></span>
		        <span class='icon-bar'></span>
		      </button>

		      <a class='navbar-brand' href='#'>Mi Pagina</a>
		    </div>
		    <div class='collapse navbar-collapse' id='myNavbar'>
		      <ul class='nav navbar-nav'>
		        <li class='active'><a href='#'>Principal</a></li>

		        <li class='dropdown'>
        		 	<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Pagina 1
			        <span class='caret'></span></a>
			        <ul class='dropdown-menu'>
			          <li><a href='#'>Pagina 1-1</a></li>
			          <li><a href='#'>Pagina 1-2</a></li>
			          <li><a href='#'>Pagina 1-3</a></li>
			        </ul>
			     </li>

		        <li><a href='#'>Pagina 2</a></li>
		        <li><a href='#'>Pagina 3</a></li>
		      </ul>
		      <ul class='nav navbar-nav navbar-right'>
		        <li>
		        <a href='#'></a>
		        </li>
		        <li class='dropdown'>
        		 	<a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class='glyphicon glyphicon-user'></span> Sign Up</a>        		 	
        		 		<ul class='dropdown-menu' width = '200' style='background-color: #333'>
				          <li>
					          <form class = 'form-inline'>
					          	<div class = 'form-group'>
					          		<label for = 'email'><font color = 'white'>Correo Electronico: </font></label>
					          		<input type='email' class = 'form-control' name='email'>
					          	</div>
					          	<div class = 'form-group'>
					          		<label for = 'pwd'><font color = 'white'>Contrase&ntildea: </font></label>
					          		<input type='password' class = 'form-control' name='pwd'>
					          	</div>
					          	<hr>
					          	<button type='submit' class='btn btn-primary'>Submit</button>
					          </form>
				          </li>				          
				        </ul>
        		 				        
			     </li>
		        <li><a href='#'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>";
?>