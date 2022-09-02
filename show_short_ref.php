<?php
	$arr = array();
	$count = 0;
	while(floor($id / pow(62, $count)) != 0) {
		#array_push($arr, floor($_GET["id"] / pow(62, $i)));
		$count++;
	}
	$sum = $id;
	#print_r($arr);
	$link = "";
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
	}
	echo "<!DOCTYPE html>
		<html>
			<head>
				<meta charset=\"utf-8\">
				<title>Укороченная ссылка</title>
				<link rel=\"stylesheet\" href=\"../header.css\">
				<link rel=\"stylesheet\" href=\"../footer.css\">
				<link rel=\"stylesheet\" href=\"../link.css\">
			</head>
			<body>
				<div id=\"header\">
					<ul>
						<li>URL-Cool</li>
						<li><a href=\"/site/faq\">FAQ</a></li>
					</ul>
				</div>";
	echo "<div id=\"main-div\"><a id=\"main\" href=\"http://oleg.mati.su/".$link."\">http://oleg.mati.su/".$link."</a></div>";
	echo "<div id=\"footer\">
		e-mail:oleg10047@gmail.com
	</div>";
	echo "</body></html>";
?>