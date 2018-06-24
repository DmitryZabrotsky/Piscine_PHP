<!DOCTYPE html>
<html>
	<head>
		<title>Database setup form</title>
<!-- 		<link rel="stylesheet" href="css/plainw.css"> -->
	</head>

	<body>
		<form action="./install.php" method="post">
			<div id="form-header"><span>SETUP DATABASE</span></div>
			<span>DB login:</span> <br/>
			<input type="text" name="msqlogin" value="<?php echo $_GET['msqlogin']; ?>" placeholder="Mysql Login" /><br />
			<span>DB password:</span> <br/>
			<input type="password" name="msqpasswd" value="<?php echo $_GET['msqpasswd']; ?>" placeholder="Mysql Password" /><br />
			<span>name for DB:</span> <br/>
			<input type="text" name="dbname" value="" placeholder="Name of the new Mysql database" /><br />
			<input id="butt" type="submit" name="submit" value="OK" />
		</form>
	</body>
</html>
