<?php session_start();
	if( isset($_SESSION["Cuenta"]) || isset($_SESSION["Usuario"]) || isset($_SESSION["Cedula"])){
		?>
			<script type="text/javascript">
				document.location = "/Proyecto2016/SesionIniciada.php";
			</script>
		<?php
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php 
			require("cabezera.php");
			Cabezera("Principal");			
		?>
		<title>Index</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body style="background-color: #A4C6CF;">

		<div class="container">
		  <br><br><br>
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		      <li data-target="#myCarousel" data-slide-to="3"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">

		      <div class="item active">
		      	
		        <img src="resources/alcaldia.jpg" alt="Alcaldia" width="460" height="345">
		        <div class="carousel-caption">
		          <a href="http://alcaldiadesancristobal.com/"><h3>Alcaldía Municipal de San Cristóbal</h3></a>
		          <p>Trabajando siempre por usted.</p>
		        </div>
		      </div>

		      <div class="item">
		      	
		        <img src="resources/deng.jpg" alt="Dengue" width="460" height="345">
		        <div class="carousel-caption">
		          <a href="https://es.wikipedia.org/wiki/Dengue"><h3>Dengue</h3></a>
		          <p>Infórmate sobre el Dengue.</p>
		        </div>
		      </div>
		    
		      <div class="item">
		      	
		        <img src="resources/chiku.jpg" alt="Chikungunya" width="460" height="345">
		        <div class="carousel-caption">
		          <a href="https://es.wikipedia.org/wiki/Chikungu%C3%B1a"><h3>Chikungunya</h3></a>
		          <p>Infórmate sobre el Chikungunya.</p>
		        </div>
		      </div>

		      <div class="item">

		        <img src="resources/zika.jpg" alt="Zika" width="460" height="345">
		        <div class="carousel-caption">
		          <a href="https://es.wikipedia.org/wiki/Virus_del_Zika"><h3>Zika</h3></a>
		          <p>Infórmate sobre el zika.</p>
		        </div>
		      </div>
		  
		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
		</div>
		<?php include("footer.php");
?>
	</body>
</html>