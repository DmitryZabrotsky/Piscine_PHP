<div class="header-login-bar">
	<?php

		$login_status_flag = TRUE;
		foreach ($users as $value) {
			if ($value[username] == $_SESSION['loggued_on_user']) {
				echo '<span class="header-login-info left">Hello <span class="header-login-value left">' . $_SESSION['loggued_on_user']. '</span></span>';
				if ($value[isadmin]){
					echo "<span> 🤝</span>";}
				else {
					echo "<span> 👤</span>";
				}
				echo '<a href="login_form/logout.php"><button class="header-btn left">EXIT</button></a>';
				if ($value[isadmin]) {
					echo '<a href="http://localhost:8080/phpmyadmin/db_structure.php?db=' . $cont[2] . '"><button class="header-btn left">ADMIN PANEL</button></a>';
				}
				$login_status_flag = FALSE;
				break ;
			}
		}
		if ($login_status_flag) {
	?>
			<a href="login_form/login.php"><button class="header-btn">SIGN IN</button></a>
			<a href="login_form/create.php"><button class="header-btn">CREATE AN ACCOUNT</button></a>
	<?php 

		} 

	?>

	<a href="bascket.php"><button class="basket-btn"><img class="basket-img" src="https://cdn1.vectorstock.com/i/thumb-large/62/70/shopping-cart-icon-in-black-dotted-silhouette-vector-18566270.jpg"></button></a>
</div>

<div class="navigation-menu">
	<a href="index.php"><span>MEDIEVAL SHOP ⚔️</span></a>
	<?php
		foreach($categories as $category) {
			echo ' <a class="menu-item" href="?cat=' . $category['id'] . '"> <span class="tab">' . $category['title'] . '</span></a>';
		}
	?>
</div>
