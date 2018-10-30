<?php

	include('main.php');

	include('update_scripts/update_users.php');
	include('update_scripts/update_categories.php');
	include('update_scripts/update_products.php');

	$show_nav_bar_and_menu = FALSE;

	$products = getGoods(0, 1000);

?>

<html>
<head>
	<title>Admin panel</title>
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" type="text/css" href="styles/admin_panel.css">
</head>
<body>
	
	<?php 

	include('header.php'); 

	?>
<div class="adm_info">

	<a class="back-to-main" href="index.php">&lsaquo; BACK to main</a>

	<div class="adm_info_block">

		<h1 class="adm_info_block_header">USERS</h1>

			<?php

				foreach ($users[0] as $key => $info) {
					echo "<input type='text' value='".$key."' readonly>";
				}


				echo "<form action='admin_panel.php' method='post'>";

				foreach ($users[0] as $key => $info) {
					// echo "{$key}  {$info} ";
					if ($key == "id")
					{
						echo "<input type='text' name='".$key."' readonly>";
					} 
					else 
					{
						echo "<input type='text' name='".$key."'>";
					}
				}

				echo "<input type='submit' name='btn' value='add_new_user'>";
				echo "</form>";

			?>

			<br><br>

			<?php 

				foreach ($users as $user) {

					echo "<form action='admin_panel.php' method='post'>";

						foreach ($user as $key => $info) {
							// echo "{$key}  {$info} ";
							if ($key == "id")
							{
								echo "<input type='text' name='".$key."' value='".$info."' readonly>";
							} 
							else 
							{
								echo "<input type='text' name='".$key."' value='".$info."'>";
							}
						}

					echo "<input type='submit' name='btn' value='update_user'>";
					echo "<input type='submit' name='btn' value='del_user'>";
					echo "</form>";

					?> <!-- <br><br> --> <?php

				}

			?>

	</div>








	<div class="adm_info_block">

		<h1 class="adm_info_block_header">CATEGORIES</h1>

			<?php

				foreach ($categories[0] as $key => $info) {
					echo "<input type='text' value='".$key."' readonly>";
				}

				echo "<form action='admin_panel.php' method='post'>";

				foreach ($categories[0] as $key => $info) {
					// echo "{$key}  {$info} ";
					if ($key == "id")
					{
						echo "<input type='text' name='".$key."' readonly>";
					} 
					else 
					{
						echo "<input type='text' name='".$key."'>";
					}
				}

				echo "<input type='submit' name='btn' value='add_new_categorie'>";
				echo "</form>";

			?>

			<br><br>

			<?php 

				foreach ($categories as $cat) {

					echo "<form action='admin_panel.php' method='post'>";

					foreach ($cat as $key => $info) {
						// echo "{$key} => {$info} ";
						echo "<input type='text' name='".$key."' value='".$info."'>";
					}

					echo "<input type='submit' name='btn' value='update_categorie'>";
					echo "<input type='submit' name='btn' value='del_categorie'>";
					echo "</form>";


					?> <!-- <br><br> --> <?php
				}

			?>

	</div>







	<div class="adm_info_block">

		<h1 class="adm_info_block_header">PRODUCTS</h1>

				<?php

				foreach ($products[0] as $key => $info) {
					echo "<input type='text' value='".$key."' readonly>";
				}


				echo "<form action='admin_panel.php' method='post'>";

				foreach ($products[0] as $key => $info) {
					// echo "{$key}  {$info} ";
					if ($key == "id")
					{
						echo "<input type='text' name='".$key."' readonly>";
					} 
					else 
					{
						echo "<input type='text' name='".$key."'>";
					}
				}

				echo "<input type='submit' name='btn' value='add_new_product'>";
				echo "</form>";

			?>

			<br><br>

			<?php 

				foreach ($products as $prod) {

					echo "<form action='admin_panel.php' method='post'>";

						foreach ($prod as $key => $info) {
							// echo "{$key}  {$info} ";
							if ($key == "id")
							{
								echo "<input type='text' name='".$key."' value='".$info."' readonly>";
							} 
							else 
							{
								echo "<input type='text' name='".$key."' value='".$info."'>";
							}
						}

					echo "<input type='submit' name='btn' value='update_product'>";
					echo "<input type='submit' name='btn' value='del_product'>";
					echo "</form>";

					?> <!-- <br><br> --> <?php

				}

			?>

	</div>

</div> <!-- adm info -->

</body>
</html>