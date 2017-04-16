<?php
	session_start();
	class Carrito
	{
		//Aquí guardamos el contenido del carrito
		private $carrito = array();
		public function __construct()
		{
			if( !isset($_SESSION['carrito']) ){
				$_SESSION['carrito'] = null;
				$this->$carrito['precio_total'] = 0;
				$this->$carrito['articulos_total'] = 0;
			}
			$carrito = $_SESSION['carrito'];
		}

		public function add($articulo = array()){

			if( !is_array($articulo) || empty($articulo) ){
				throw new Exception("Error Processing Request", 1);				
			}
		}
	}

?>