<?php
	function Recursiva($i,$j,$mat,$val,&$cont){
		$mat[$i][$j] = 0;
		$cont++;
		if( $i+1 < 10 && $mat[$i+1][$j] == $val)
			$mat = Recursiva($i+1,$j,$mat,$val,$cont);
		if( $j+1 < 10 && $mat[$i][$j+1] == $val)
			$mat = Recursiva($i,$j+1,$mat,$val,$cont);
		if( $i-1 >= 0 && $mat[$i-1][$j] == $val)
			$mat = Recursiva($i-1,$j,$mat,$val,$cont);
		if( $j-1 >= 0 && $mat[$i][$j-1] == $val)
			$mat = Recursiva($i,$j-1,$mat,$val,$cont);
		return $mat;
	}
	function rellenar($mat){
		for ($i=9; $i >= 1 ; $i--) {							
			for ($j=0; $j < 10; $j++) { 
				if($mat[$i][$j] == 0){		
					for ($k=$i; $k >=0 ; $k--) { 
						if(($pos = Buscar($k,$j,$mat)) == -1)
							break;
						$mat[$k][$j] = $mat[$pos][$j];
						$mat[$pos][$j] = 0;
					}
				}					
			}			
		}
		return $mat;
	}
	function Buscar($x,$j,$mat){
		for ($i=$x; $i >= 0 ; $i--) { 
			if( $mat[$i][$j] != 0){
				return $i;
			}
		}
		return -1;
	}
	function Perdio($mat){
		for ($i=9; $i >= 1 ; $i--) {							
			for ($j=0; $j < 10; $j++) { 
				if($mat[$i][$j] != 0)
				if( ($i+1 < 10 && $mat[$i+1][$j] == $mat[$i][$j]) || ($j+1 < 10 && $mat[$i][$j+1] == $mat[$i][$j]) || ($i-1 >= 0 && $mat[$i-1][$j] == $mat[$i][$j]) || ($j-1 >= 0 && $mat[$i][$j-1] == $mat[$i][$j]) )
					return false;
			}
		}
		return true;
	}
?>