<?php

	if ($_POST["btn"] == "update_user") 
	{
	
		// var_dump($_POST);

		$password = hash('whirlpool', $_POST["password"]);

		$sql = "UPDATE users SET username = '".$_POST["username"]."', password = '".$password."', isadmin = ".$_POST["isadmin"].", email = '".$_POST["email"]."', address = '".$_POST["address"]."' WHERE id = ".$_POST["id"];

		if (!mysqli_query($conn, $sql)) {
			die("Error update users: " . mysqli_error($conn));
		}
		
		header('Location: admin_panel.php?upd');
	}

	if ($_POST["btn"] == "add_new_user")
	{
	
		// var_dump($_POST);

		$password = hash('whirlpool', $_POST["password"]);

		$sql = "INSERT INTO users (username, password, isadmin, email, address) VALUES ('".$_POST["username"]."', '".$password."', ".$_POST["isadmin"].", '".$_POST["email"]."', '".$_POST["address"]."')";

		if (!mysqli_query($conn, $sql)) {
			die("Error add new user: " . mysqli_error($conn));
		}
		
		header('Location: admin_panel.php?upd');
	}

	if ($_POST["btn"] == "del_user")
	{
	
		// var_dump($_POST);

		$password = hash('whirlpool', $_POST["password"]);

		$sql = "DELETE FROM `users` WHERE `users`.`id` = ".$_POST["id"];

		if (!mysqli_query($conn, $sql)) {
			die("Error delete user: " . mysqli_error($conn));
		}
		
		header('Location: admin_panel.php?upd');
	}

?>