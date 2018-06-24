<!DOCTYPE html>
<html>
	<head>
		<title>Registration form</title>
		<!-- <link rel="stylesheet" href="../css/plainw.css"> -->
	</head>

	<body>
		<form action="na_creation.php" method="post">
			<div id="form-header">Fill account informtion<a href="../index.php" class="close">&times;</a></div>
			<?php
				if ($_GET['loginErr'] == 1) {
					echo "<div class=\"errvis\">Worng info!</div>";
				}
				else if ($_GET['loginErr'] == 2) {
					echo "<div class=\"errvis\">User already exists.</div>";
				}
				else {
					echo "<div class=\"errhide\">Check the input fields!</div>";
				}
			?>
			<input type="text" name="login" value="<?php echo $_GET['login']; ?>" placeholder="Username" /><br />
			<input type="password" name="passwd" value="" placeholder="Password" /><br />
			<input type="text" name="address" value="<?php echo $_GET['address']; ?>" placeholder="address" /><br />
			<input type="email" name="email" value="<?php echo $_GET['email']; ?>" placeholder="email" /><br />
			<input id="butt" type="submit" name="submit" value="OK" />
		</form>
	</body>
</html>