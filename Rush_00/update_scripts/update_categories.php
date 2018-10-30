<?php

	if ($_POST["btn"] == "update_categorie") 
	{
	
		var_dump($_POST);

		$sql = "UPDATE categories SET title = '".$_POST["title"]."' WHERE id = ".$_POST["id"];

		if (!mysqli_query($conn, $sql)) {
			die("Error update categorie: " . mysqli_error($conn));
		}
		
		header('Location: admin_panel.php?upd');
	}

	if ($_POST["btn"] == "add_new_categorie")
	{
	
		// var_dump($_POST);

		$sql = "INSERT INTO categories (title) VALUES ('".$_POST["title"]."')";

		if (!mysqli_query($conn, $sql)) {
			die("Error add new categorie: " . mysqli_error($conn));
		}
		
		header('Location: admin_panel.php?upd');
	}

	if ($_POST["btn"] == "del_categorie")
	{
	
		// var_dump($_POST);

		$sql = "DELETE FROM `categories` WHERE `categories`.`id` = ".$_POST["id"];

		if (!mysqli_query($conn, $sql)) {
			die("Error delete categorie: " . mysqli_error($conn));
		}

		$sql = "DELETE FROM `categories_products` WHERE `categories_products`.`id_category` = ".$_POST["id"];

		if (!mysqli_query($conn, $sql)) {
			die("Error delete categorie from categorie_product: " . mysqli_error($conn));
		}
		
		header('Location: admin_panel.php?upd');
	}

?>