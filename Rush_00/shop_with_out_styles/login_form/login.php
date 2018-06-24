<!DOCTYPE html>
<html>
	<head>
		<title>Sign in form</title>
		<link rel="stylesheet" href="../styles/login.css">
	</head>

	<body>

	<div class="page-title">
		<div class="user-login-text">
			USER login form
		</div>
	</div>

		<form action="lg_in.php" method="POST">
		
			<?php
		
				if ($_GET['loginErr'] == 1)
					echo "<div class=\"error-msg-on\">Check the input fields!</div>";
				else
					echo "<div class=\"error-msg-off\">Check the input fields!</div>";
		
			?>
			<span class="input-header">Login:</span> 
			<br/>
			<input class="input-field" type="text" name="login" value="<?php echo $_GET['login']; ?>" placeholder="Username" />
			<br/>
			<span class="input-header">Password:</span> 
			<br/>
			<input class="input-field" type="password" name="passwd" value="" placeholder="Password" />
			<br/>
			<input class="input-field-ok submit-button" class="input-field" id="butt" type="submit" name="submit" value="OK" />
			<a class="input-field-ok cancel-button" href="../index.php" class="close">cancel</a>
		</form>

		<div class="create-new-user-button">
			<a href="create.php">create NEW account</a><br/>
		</div>

	</body>
</html>