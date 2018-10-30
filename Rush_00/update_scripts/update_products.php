<?php

	if ($_POST["btn"] == "update_product") 
	{
	
		// var_dump($_POST);

		$sql = "UPDATE products SET title = '".$_POST["title"]."', img = '".$_POST["img"]."', intro = '".$_POST["intro"]."', price = ".$_POST["price"].", category = ".$_POST["category"].", stats = '".$_POST["stats"]."' WHERE id = ".$_POST["id"];

		if (!mysqli_query($conn, $sql)) {
			die("Error update product: " . mysqli_error($conn));
		}

		$sql = "UPDATE `categories_products` SET `id_category` = '".$_POST["category"]."' WHERE `categories_products`.`id_product` = ".$_POST["id"];

		if (!mysqli_query($conn, $sql)) {
			die("Error update categories_products: " . mysqli_error($conn));
		}
		
		header('Location: admin_panel.php?upd');
	}

	if ($_POST["btn"] == "add_new_product")
	{
	
		// var_dump($_POST);

		$sql = "INSERT INTO products (title, img, intro, price, category, stats) VALUES ('".$_POST["title"]."', '".$_POST["img"]."', '".$_POST["intro"]."', ".$_POST["price"].", ".$_POST["category"].", '".$_POST["stats"]."')";

		if (!mysqli_query($conn, $sql)) {
			die("Error add new product: " . mysqli_error($conn));
		}

		$title = $_POST["title"];

		$sql = "SELECT id FROM products WHERE title = '".$title."'";

		if ($res = mysqli_query($conn, $sql)) {
			while ($tmp = mysqli_fetch_assoc($res)) {
				$ids[] = $tmp;
			}
			mysqli_free_result($res);
		}

		$id = $ids[0]["id"];

		echo $id;

		$titel = "";

		$sql = "INSERT INTO categories_products (id_category, id_product) VALUES (".(int) $_POST["category"].", ".(int) $id.")";

		echo $sql;

		if (!mysqli_query($conn, $sql)) {
			die("Error filling categories: " . mysqli_error($conn));
		}
		
		header('Location: admin_panel.php?upd');
	}

	if ($_POST["btn"] == "del_product")
	{
	
		// var_dump($_POST);

		$sql = "DELETE FROM `products` WHERE `products`.`id` = ".$_POST["id"];

		if (!mysqli_query($conn, $sql)) {
			die("Error delete product: " . mysqli_error($conn));
		}

		$sql = "DELETE FROM `categories_products` WHERE `categories_products`.`id_product` = ".$_POST["id"];

		if (!mysqli_query($conn, $sql)) {
			die("Error delete product form categorie_product: " . mysqli_error($conn));
		}
		
		header('Location: admin_panel.php?upd');
	}

?>