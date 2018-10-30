<?php 
	include('../db.php');

	if ($_POST["login"] == FALSE or $_POST["passwd"] == FALSE or $_POST["submit"] != "OK") {
		header("Location: create_user_page.php?loginErr=1&login=" . $_POST["login"] . "&address=" . $_POST["address"] . "&email=" . $_POST["email"]);
		exit("ERROR\n");
	}

	if (!file_exists('../db.php')) {
			header('Location: ../intro.php');
		}

	$connection = mysqli_connect("localhost", $dbuser, $dbpass, $dbname);
	if (!$connection) {
		echo "Whatch out! MySQL connection ERROR!";
		die("Connection failed: " . mysqli_connect_error());
	}

	$users = array();
	if ($result = mysqli_query($connection, 'SELECT * FROM users')) {
		while ($tmp = mysqli_fetch_assoc($result)) {
			$users[] = $tmp;
		}
		mysqli_free_result($result);
	}

	$login = $_POST["login"];
	$password = hash('whirlpool', $_POST["passwd"]);
	$address = $_POST["address"];
	$email = $_POST["email"];
	foreach ($users as $val) {
		if ($val['username'] == $login) {
			mysqli_close($connection);
			header("Location: create_user_page.php?loginErr=2&login=" . $_POST["login"] . "&address=" . $_POST["address"] . "&email=" . $_POST["email"]);
			exit("ERROR\n");
		}
	}

	$sql = "INSERT INTO users (username, password, isadmin, email, address)
		VALUES ('$login', '$password', false, '$email', '$address')";
	if (!mysqli_query($connection, $sql)) {
		mysqli_close($connection);
		header("Location: create_user_page.php?loginErr=3&login=" . $_POST["login"] . "&address=" . $_POST["address"] . "&email=" . $_POST["email"]);
		die("Error ADDING USER: " . mysqli_error($connection));
	}
	$to = $_POST["email"];
	$headers = "From: gaben@steam.com\r\n";
	$headers .= "Reply-To: gaben@steam.com\r\n";
	$headers .= "CC: gaben@steam.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = '<h1>Dear, ' . $login . '!</h1>';
	$message .= "<h3>We are glad to see you in the Dark ZOO Store!</h3>";
	$message .="<h3>We will send you information about our promotions and new articles.</h3><br />";
	$message .= "<h2>Best wishes!</h2>";
	mail($to, "Dark ZOO", $message, $headers);
	mysqli_close($connection);
	header("Location: login_script.php?login=". $login. "&passwd=" . $password . "&submit=OK&get=1");
?>