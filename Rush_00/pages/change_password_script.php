<?php
	if ($_POST["oldpasswd"] == FALSE or $_POST["passwd"] == FALSE or $_POST["newpasswd"] == FALSE or $_POST["newpasswd"] != $_POST["passwd"] or $_POST["submit"] != 'OK') {
		header('Location: change_password_form.php?erRor=1');
		exit("ERROR\n");
	}

	$password = hash('whirlpool', $_POST["oldpasswd"]);

	include('auth.php');

	session_start();
	if(isset($_SESSION['loggued_on_user']))
	{
		$login = $_SESSION['loggued_on_user'];
	}

	if (auth($login, $password) === TRUE) {
		if (!file_exists('../db.php')) {
			header('Location: ../intro.php');
		}
		$connection = mysqli_connect("localhost", $dbuser, $dbpass, $dbname);
		$passwd = hash('whirlpool', $_POST["passwd"]);
		$sql = "UPDATE users SET `password` = '" . $passwd . "' WHERE `username` = '" . $login . "'";
		if (!mysqli_query($connection, $sql)) {
			die("Error: " . mysqli_error($connection));
		}
		else {

			$users = array();
			if ($result = mysqli_query($connection, 'SELECT * FROM users')) {
				while ($tmp = mysqli_fetch_assoc($result)) {
					$users[] = $tmp;
				}
				mysqli_free_result($result);
			}
			foreach ($users as $val) {
				if ($val['username'] == $login) {
					$to = $val['email'];
				}
			}
			$headers = "From: gaben@steam.com\r\n";
			$headers .= "Reply-To: gaben@steam.com\r\n";
			$headers .= "CC: gaben@steam.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$message = "<h1>Dear ". $login ."!</h1>";
			$message .= "<h3>Your password has been changed!</h1>";
			$message .= "<h3>Thanks for choosing us!</h3>";
			mail($to, "Password modification", $message, $headers);
			mysqli_close($connection);
			header('Location: ../index.php');
			exit("OK\n");
		}
	}
	header('Location: change_password_form.php?loginErr=2');
	exit("ERROR\n");
?>