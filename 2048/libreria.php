<?php
	function RevArriba($i,$j,$mat){
		for ($y=$i-1; $y >= 0 ; $y--) { 
			if($mat[$y][$j] != 0){
				if(sumar($i,$j,$y,$j,$mat))
					return -1;				
				return $y+1;
			}				
		}
		return 0;
	}
	function RevAbajo($i,$j,$mat){
		for ($y=$i+1; $y < 4 ; $y++) { 
			if($mat[$y][$j] != 0){	
				if(sumar($i,$j,$y,$j,$mat))
					return -1;				
				return $y-1;
			}				
		}
		return 3;
	}
	function RevIzquierda($i,$j,$mat){
		for ($y=$j-1; $y >= 0 ; $y--) { 
			if($mat[$i][$y] != 0){	
				if(sumar($i,$j,$i,$y,$mat))
					return -1;				
				return $y+1;
			}				
		}
		return 0;
	}
	function RevDerecha($i,$j,$mat){
		for ($y=$j+1; $y < 4 ; $y++) { 
			if($mat[$i][$y] != 0){
				if(sumar($i,$j,$i,$y,$mat))
					return -1;	
				return $y-1;
			}				
		}
		return 3;
	}
	function sumar($i,$j,$i2,$j2,$mat){
		return $mat[$i][$j] == $mat[$i2][$j2];
	}
	function sumarArriba($i,$j,$mat){
		for ($y=$i-1; $y >= 0 ; $y--) { 
			if($mat[$y][$j] != 0){						
				return $y;
			}				
		}
	}
	function sumarAbajo($i,$j,$mat){
		for ($y=$i+1; $y < 4 ; $y++) { 
			if($mat[$y][$j] != 0){							
				return $y;
			}				
		}
	}
	function sumarIzquierda($i,$j,$mat){
		for ($y=$j-1; $y >= 0 ; $y--) { 
			if($mat[$i][$y] != 0){					
				return $y;
			}				
		}
	}
	function sumarDerecha($i,$j,$mat){
		for ($y=$j+1; $y < 4 ; $y++) { 
			if($mat[$i][$y] != 0){
				return $y;
			}				
		}
	}
	function perdio($mat){
		for ($i=0; $i < 4; $i++) { 
			for ($j=0; $j < 4; $j++) { 
				if($mat[$i][$j] == 0)
					return false;
			}
		}
		for ($i=0; $i < 4; $i++) { 
			for ($j=0; $j < 4; $j++) { 
				if(($i+1 < 4 && $mat[$i+1][$j] == $mat[$i][$j]) || ($j+1 < 4 && $mat[$i][$j+1] == $mat[$i][$j]) || ($i-1 >= 0 && $mat[$i-1][$j] == $mat[$i][$j]) || ($j-1 >= 0 && $mat[$i][$j-1] == $mat[$i][$j])){
					return false;
				}
			}
		}
		return true;
	}
?>