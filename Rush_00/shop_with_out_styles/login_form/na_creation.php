<?php 

	if ($_POST["login"] == FALSE || $_POST["passwd"] == FALSE || $_POST["submit"] != "OK") {
		header("Location: create.php?loginErr=1&login=" . $_POST["login"] . "&address=" . $_POST["address"] . "&email=" . $_POST["email"]);
		exit("ERROR\n");
	}
	$cont = file_get_contents('../shopdb.csv');
	if (!$cont) {
		header('Location: ../intro.html');
	}
	$cont = explode(';', $cont);

	$conn = mysqli_connect("localhost", $cont[0], $cont[1], $cont[2]);
	if (!$conn) {
		echo "Debug info :: ";
		print_r($cont);
		?>
		<br />You, perhaps, have changed password and/or login and/or name of your mySQL database.<br />
		Please check the shopdb.csv file in the root of your server directory.<br /><br />
		shopdb.csv file has next syntax ::    login_to_your_mysql:password_to_your_mysql:name_of_your_database_on_mysql<br /><br />
<?php
		die("Connection failed: " . mysqli_connect_error());
	}

	$users = array();
	if ($result = mysqli_query($conn, 'SELECT * FROM users')) {
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
			mysqli_close($conn);
			header("Location: create.php?loginErr=2&login=" . $_POST["login"] . "&address=" . $_POST["address"] . "&email=" . $_POST["email"]);
			exit("ERROR\n");
		}
	}

	$sql = "INSERT INTO users (username, password, isadmin, email, address)
		VALUES ('$login', '$password', false, '$email', '$address')";
	if (!mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		header("Location: create.php?loginErr=3&login=" . $_POST["login"] . "&address=" . $_POST["address"] . "&email=" . $_POST["email"]);
		die("Error ADDING USER: " . mysqli_error($conn));
	}
	$to = $_POST["email"];
	$headers = "From: medieval@armor.io\r\n";
	$headers .= "Reply-To: medieval@armor.io\r\n";
	$headers .= "CC: medieval@armor.io\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = '<h1>Dear, ' . $login . '!</h1>';
	$message .= "<p>We are so glad to see you in the Medieval Armor Store!</p>";
	$message .="<p>We will send you all the information about our promotions and new articles.</p><br />";
	$message .= "<p>Best regards!</p>";
	mail($to, "Medieval Armor Store", $message, $headers);
	mysqli_close($conn);
	header("Location: lg_in.php?login=". $login. "&passwd=" . $password . "&submit=OK&get=1");
?>