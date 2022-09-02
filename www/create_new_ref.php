<?php
	try {
		$host = "localhost";
		$db_name = "refs";
		$user = "root";
		$dsn = "mysql:host=$host;dbname=$db_name";

		$opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

		$dbh = new PDO($dsn, $user);

		$query = $dbh->prepare("INSERT INTO refs (ref) values (:ref)");
		$query->bindParam(':ref', $_POST["ref"]);
		$query->execute();
		$id = $dbh->lastInsertId();
		#$result = $query->fetchColumn(0);
		#echo $result;
		header('Location: http://url.cool/show_short_ref.php?id='.$id);
	}
	catch (PDOException $e) {
		die('Подключение не удалось: ' . $e->getMessage());
	}
?>