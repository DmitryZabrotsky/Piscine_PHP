<!DOCTYPE html>
<html>
	<head>
		<title>Change password!</title>
		<!-- <link rel="stylesheet" href="../css/plainw.css"> -->
	</head>

	<body>
		<form action="chn_ps.php" method="post">
			<div id="form-header">CHANGE PASSWORD<a href="../index.php" class="close">&times;</a></div>
			<?php
				if ($_GET['loginErr']) {
					echo "<div class=\"errvis\">Worng info!</div>";
				}
				else {
					echo "<div class=\"errhide\">Worng info!</div>";
				}
			?>
			<input type="text" name="login" value="" placeholder="Username" /><br />
			<input type="password" name="oldpasswd" value="" placeholder="Old Password" /><br />
			<input type="password" name="passwd" value="" placeholder="New Password" /><br />
			<input type="password" name="newpasswd" value="" placeholder="Type New Password again" /><br />
			<input id="butt" type="submit" name="submit" value="OK" />
		</form>
	</body>
</html>