<?php
	if (!$_POST["msqlogin"] || !$_POST["msqpasswd"] || !$_POST["dbname"] || $_POST["submit"] != "OK") {
		exit("BAD INPUT\n");
	}

	$servername = "localhost";
	$username = $_POST['msqlogin'];
	$password = $_POST['msqpasswd'];
	$dbname = $_POST['dbname'];

	$conn = mysqli_connect($servername, $username, $password);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	unlink('db.php');
	$sql = "DROP DATABASE IF EXISTS $dbname";
	mysqli_query($conn, $sql);

	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating database: " . mysqli_error($conn));
	}
	mysqli_close($conn);
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS categories (
			id INT(15) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			title VARCHAR(255) NOT NULL
			)";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating categories: " . mysqli_error($conn));
	}

	$sql = "INSERT INTO categories (id, title)
			VALUES (1, 'Birds'), (2, 'Hocktail'), (3, 'Fish')";
	if (!mysqli_query($conn, $sql)) {
		die("Error filling categories: " . mysqli_error($conn));
	}

	$sql = "CREATE TABLE IF NOT EXISTS products (
			id INT(15) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			title VARCHAR(255) NOT NULL,
			img VARCHAR(255) DEFAULT NULL,
			category VARCHAR(255) DEFAULT NULL,
			intro text NOT NULL,
			price DECIMAL(10,0) NOT NULL,
			stats VARCHAR(255) DEFAULT NULL
			)";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating products: " . mysqli_error($conn));
	}

	$sql = "INSERT INTO products (id, title, img, intro, price, category, stats)
			VALUES (1, 'Goose', 'http://www.stickpng.com/assets/images/580b57fbd9996e24bc43bbe6.png', 'Ga-ga-ga', '700', '1', 'bites'),
			(2, 'Cock', 'https://pngimg.com/uploads/cock/cock_PNG9.png', 'Ko-ko-ko', '300', '1', 'pecking'),
			(3, 'Duck', 'http://www.stickpng.com/assets/images/5a01931c7ca233f48ba6272d.png', 'Krya-Krya', '280', '1', 'friendly'),
			(4, 'Horse', 'http://pluspng.com/img-png/png-hd-horse-running-horse-png-horse-hd-png-1200.png', 'I-go-go', '7800', '2', '+ 1 horse force'),
			(5, 'Cow', 'https://pre00.deviantart.net/b60d/th/pre/f/2015/256/c/e/cow_png_by_kasirun_hasibuan-d99f152.png', 'Moooooo', '5000', '2', 'Give some milk every day!'),
			(6, 'Elephant', 'https://pre00.deviantart.net/b5b4/th/pre/i/2017/059/d/4/elephant_by_hz_designs-db0rwkm.png', 'Boooooo', '42000', '2', 'Weight 32000'),
			(7, 'Orange fish', 'http://pluspng.com/img-png/angel-fish-png-hd-peppermint-angelfish-whalebite-png-710.png', 'bluo-blu', '40', '3', 'useless but pretty'),
			(8, 'Dolphin', 'https://orig00.deviantart.net/69ec/f/2012/115/d/d/dolphin_png_by_lg_design-d4xlqgs.png', 'Ee-ee-ee-e', '1332', '3', 'Little Mermaid Friends'),
			(9, 'Blue fish', 'https://ubisafe.org/images/fish-transparent-beautiful-4.png', 'blue-blueee', '100', '3', 'To fast!')";
	if (!mysqli_query($conn, $sql)) {
		die("Error filling products: " . mysqli_error($conn));
	}

	$sql = "CREATE TABLE IF NOT EXISTS categories_products (
			id_category INT(15) NOT NULL, 
			id_product INT(15) NOT NULL,
			PRIMARY KEY (id_category, id_product)
			)";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating categories_products: " . mysqli_error($conn));
	}
	$sql = "INSERT INTO categories_products (id_category, id_product)
			VALUES (1, 1), (1, 2), (1, 3), (2, 4), (2, 5), (2, 6), (3, 7), (3, 8), (3, 9)";
	if (!mysqli_query($conn, $sql)) {
		die("Error filling categories: " . mysqli_error($conn));
	}

	$sql = "CREATE TABLE IF NOT EXISTS orders (
		id_ord INT(15) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		username VARCHAR(255) NOT NULL,
		email VARCHAR(255),
		address VARCHAR(255)
	)";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating order: " . mysqli_error($conn));
	}

	$sql = "CREATE TABLE IF NOT EXISTS users (
			id INT(15) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			username VARCHAR(255) NOT NULL,
			password TEXT NOT NULL,
			isadmin BOOLEAN NOT NULL,
			email VARCHAR(255),
			address VARCHAR(255)
			)";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating users: " . mysqli_error($conn));
	}
	$adminPass = hash('whirlpool', 'admin');
	$sql = "INSERT INTO users (id, username, password, isadmin)
		VALUES (1, 'admin', '" . $adminPass . "', true)";
	if (!mysqli_query($conn, $sql)) {
		die("Error filling users: " . mysqli_error($conn));
	}

	file_put_contents('db.php', "<?php \n \$dbuser = '$username';\n \$dbpass = '$password'; \n \$dbname = '$dbname';\n ?>");
	mysqli_close($conn);
	session_start();
	foreach ($_SESSION as $key => $value) {
		$_SESSION[$key] = FALSE;
	}
	header('Location: index.php');
?>