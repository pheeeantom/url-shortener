<?php
	#session_start();
	#if (isset($_SESSION["valid"])) {
	if (sha1("r4Ep2YM6pW8f".$_POST["open-key"].strval(floor(time()/1000))) == $_POST["hash"]) {
		try {
			$host = "localhost";
			$db_name = "oleg_references";
			$user = "oleg";
			$pass = "asdf";
			$dsn = "mysql:host=$host;dbname=$db_name";

			$opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

			$dbh = new PDO($dsn, $user, $pass);

			$query = $dbh->prepare("INSERT INTO refs (ref) values (:ref)");
			$query->bindParam(':ref', $_POST["ref"]);
			$query->execute();
			$id = $dbh->lastInsertId();
			#unset($_SESSION["valid"]);
			#$result = $query->fetchColumn(0);
			#echo $result;
			#header('Location: http://oleg.mati.su/show_short_ref.php?id='.$id);
			include 'show_short_ref.php';
		}
		catch (PDOException $e) {
			die('Подключение не удалось: ' . $e->getMessage());
		}
	}
	else {
		header("Location: http://oleg.mati.su/");
	}
?>