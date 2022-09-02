<?php
	$sum = 0;
	for ($i = strlen($_GET["id"]) - 1; $i >= 0; $i--) {
		if (ctype_upper(substr($_GET["id"], $i, 1))) {
			$sum = $sum + (ord(substr($_GET["id"], $i, 1)) - 65 + 36) * pow(62, strlen($_GET["id"]) - $i - 1);
		}
		else if (ctype_lower(substr($_GET["id"], $i, 1))) {
			$sum = $sum + (ord(substr($_GET["id"], $i, 1)) - 97 + 10) * pow(62, strlen($_GET["id"]) - $i - 1);
		}
		else if (ctype_digit(substr($_GET["id"], $i, 1))) {
			$sum = $sum + substr($_GET["id"], $i, 1) * pow(62, strlen($_GET["id"]) - $i - 1);
		}
	}
	#echo $sum;
	try {
		$host = "localhost";
		$db_name = "refs";
		$user = "root";
		$pass = "asdf";
		$dsn = "mysql:host=$host;dbname=$db_name";

		$opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

		$dbh = new PDO($dsn, $user);

		$query = $dbh->query('SELECT * FROM refs WHERE id='.$sum);
		$row = $query->fetch();
		if ($row['ref']) {
			header('Location: '.$row['ref']);
		}
		else {
			header('HTTP/2 404 not found');
		}
	}
	catch (PDOException $e) {
		die('Подключение не удалось: ' . $e->getMessage());
	}
?>