<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
<!-- 		<link rel="stylesheet" href="../css/plainw.css"> -->
	</head>

	<body>
		<form action="lg_in.php" method="post">
			<div id="form-header" style="margin-bottom: 1.5vh;">USER LOGIN<a href="../index.php" class="close">&times;</a></div>
				<div class="middle_text">
					<a href="create.php">CREATE new account</a><br/>
						or <br/>
					<a href="change_pass.php">CHANGE password an existing account</a>
				</div>
			<?php
				if ($_GET['loginErr'] == 1)
					echo "<div class=\"errvis\">Check the input fields!</div>";
				else
					echo "<div class=\"errhide\">Check the input fields!</div>";
			?>
			<input type="text" name="login" value="<?php echo $_GET['login']; ?>" placeholder="Username" /><br/>
			<input type="password" name="passwd" value="" placeholder="Password" /><br/>
			<input id="butt" type="submit" name="submit" value="OK" />
		</form>
	</body>
</html>