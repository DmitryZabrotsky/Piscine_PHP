<div class="header-login-bar">

	<?php

		$login_status_flag = TRUE;
		foreach ($users as $value) {
			if ($value["username"] == $_SESSION['loggued_on_user']) {
				echo '<span class="header-login-info">Hello <span class="header-login-value"><a href="pages/change_password_form.php" title="Press to change your password">' . $_SESSION['loggued_on_user']. '</a></span></span>';
				if ($value["isadmin"]){
					echo "<span> 🤝</span>";}
				else {
					echo "<span> 👤</span>";
				}
				echo '<a href="pages/logout.php"><button class="header-btn">EXIT</button></a>';
				if ($value['isadmin']) {
					echo '<a href="admin_panel.php"><button class="header-btn">ADMIN PANEL</button></a>';
				}
				$login_status_flag = FALSE;
				break ;
			}
		}
		if ($login_status_flag) {
	?>
			<a href="pages/login.php"><button class="header-btn">SIGN IN</button></a>
			<a href="pages/create_user_page.php"><button class="header-btn">CREATE AN ACCOUNT</button></a>
	<?php 

		} 

	?>

	<a href="basket.php"><button class="basket-btn"><img class="basket-img" src="http://icons.iconarchive.com/icons/iconsmind/outline/512/Shopping-Cart-icon.png"></button></a>
</div>

		<?php

			if ($is_basket === TRUE) { 
				echo '<div>
						<img class="pre-navigation-img" src="images/journey.png">
					</div>';
			}

		?>

<div class="navigation-menu">

		<?php

			if ($is_basket === TRUE) { 
		
		?>

		<a  class="menu-item" href="index.php"><span>All</span></a>

		<?php

			}
		
		?>

	<?php
		if ($categories != FALSE){
		foreach($categories as $category) {
			echo ' <a class="menu-item" href="?cat=' . $category['id'] . '"> <span class="tab">' . $category['title'] . '</span></a>';
		}
	}
	?>
</div>
<div class="afterline-navigation-menu"></div>
