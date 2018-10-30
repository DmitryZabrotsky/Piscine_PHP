<?php
	include('db.php');
	$is_basket = TRUE;

	if (!file_exists('db.php')) {
		header('Location: intro.php?msqlogin=root&msqpasswd=password');
	}	
	if (!($conn = mysqli_connect("localhost", $dbuser, $dbpass, $dbname))) {
		echo "ERROR\n";
		die("Connection failed: " . mysqli_connect_error());
	}


	$categories = array();
	if ($result = mysqli_query($conn, 'SELECT * FROM categories')) {
		while ($tmp = mysqli_fetch_assoc($result)) {
			$categories[] = $tmp;
		}
		mysqli_free_result($result);
	}

	function countGoods()
	{
		$products = array();
	if ($cat = isset($_REQUEST['cat'])) {
		$cat = (int) $_REQUEST['cat'];
	}
	else {
		$cat = 0;
	}

	$sql = "SELECT p.* FROM products AS p ";
	if ($cat) {
		$sql .= ' INNER JOIN categories_products AS cp ON cp.id_product=p.id AND cp.id_category=' . $cat;
	}

	if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
		while ($tmp = mysqli_fetch_assoc($result)) {
			$products[] = $tmp;
		}
		mysqli_free_result($result);
	}
	return count($products);

	}

	function getGoods($offset, $limit){
	$products = array();

	if ($cat = isset($_REQUEST['cat'])) {
		$cat = (int) $_REQUEST['cat'];
	}
	else {
		$cat = 0;
	}

	$sql = "SELECT p.* FROM products AS p ";
	if ($cat) {
		$sql .= ' INNER JOIN categories_products AS cp ON cp.id_product=p.id AND cp.id_category=' . $cat. " LIMIT $limit OFFSET $offset";
	}
	else{
		$sql .= "LIMIT $limit OFFSET $offset";
	}

	if ($result = mysqli_query($GLOBALS['conn'], $sql)) {
		while ($tmp = mysqli_fetch_assoc($result)) {
			$products[] = $tmp;
		}
		mysqli_free_result($result);
	}
	return $products;
	}

	$users = array();
	if ($result = mysqli_query($conn, 'SELECT * FROM users')) {
		while ($tmp = mysqli_fetch_assoc($result)) {
			$users[] = $tmp;
		}
		mysqli_free_result($result);
	}
	 session_start();
	if (!$_SESSION['basket']) {
		$_SESSION['basket'] = array();
	}
?>