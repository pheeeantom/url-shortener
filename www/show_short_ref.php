<?php
	$arr = array();
	$count = 0;
	while(floor($_GET["id"] / pow(62, $count)) != 0) {
		#array_push($arr, floor($_GET["id"] / pow(62, $i)));
		$count++;
	}
	$sum = $_GET["id"];
	#print_r($arr);
	for ($i = 0; $i < $count; $i++) {
		/*if ($arr[$i] > 9) {
			$code = 97 + $arr[$i] - 10;
			echo "&#".$code.";";
		}
		else {
			echo $arr[$i];
		}*/
		array_push($arr, floor($sum / pow(62, $count - 1 - $i)));
		$sum = $sum % pow(62, $count - 1 - $i);
		#print_r($arr);
		$link = "";
		if ($arr[$i] > 35) {
			$code = 65 + $arr[$i] - 36;
			$link = $link."&#".$code.";";
		}
		else if ($arr[$i] > 9) {
			$code = 97 + $arr[$i] - 10;
			$link = $link."&#".$code.";";
		}
		else {
			$link = $link.$arr[$i];
		}
		echo "<a href=\"http://url.cool/".$link."\">http://url.cool/".$link."</a>";
	}
?>