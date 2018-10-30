<div class="pagination">
<?php 
	$pages = round(countGoods()/$limit);
	if ($pages > 1)
	{
		$isoff = 0;
		if (isset($_GET['offset']))
		{
			$isoff = $_GET['offset'];
		}

	for ($i=0; $i < $pages; $i++) { 
		$offset = $limit * $i;

		$active = "";
		if ($offset == $isoff){
			$active = "active";
		}
		if ($cat = isset($_REQUEST['cat'])) {
		$cat = (int) $_REQUEST['cat'];
		}
		else {
			$cat = 0;
		}

		echo "<div class='pag $active'><a href='index.php?cat=$cat&offset=$offset'>$i</a></div>";
	}
	}
 ?>
 </div>
