<?php


function getResult($x, $y, $r){

  $ans = "Точка не в зоне";

  if($x > 0){
    if($y <= 0 && $x <= ($r/2) && $y >= ($r * (-1))){
      $point = true;
    }
  }

		if($x < 0 ){
			if($y >= 0 && ($y * $y + $x * $x) <= ($r * $r)){
				$point = true;
			}

			if($y <= 0 && $y >= ($x * (-1) + $r/2)){
				$point = true;
			}

		}

		if($x == 0){
			if($y <= $r && $y >= ($r * (-1))){
					$point = true;
			}
		}

		
		if($point == true){
			$ans = "Точка в зоне";
		}

    return $ans;
}
	?>
