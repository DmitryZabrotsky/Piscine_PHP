<div class="goods-grid">
	<?php 
		if(isset($_GET['offset'])){
			$offset = $_GET['offset'];
		}
		else{
			$offset = 0;
		}

		if(isset($_GET['limit'])){
			$limit = $_GET['limit'];
		}
		else{
			$limit = 6;
		}


		$products = getGoods($offset, $limit);
		foreach($products as $product) {
	
	?>
			<div class="item">
				<div class="item-stats"><h4><?php echo $product['stats'];?></h4></div>
				<img clas="item-img" src="<?php echo $product['img'];?>" alt="item-img">
				<div class="caption">
					<div class="item-price"><h2>&dollar;<?php echo $product['price'];?></h2></div>
					<div class="item-title"><h1><?php echo $product['title'];?></h1></div>
					<div class="item-intro"><h4><?php echo $product['intro'];?></h4></div>
					<div class="item-buttons">
						<a href="basket.php?item=<?php echo $product['id']; ?>"><button class="button-buy-item">BUY</button></a>
						<a href="basket.php?additem=<?php echo $product['id']; ?>"><button class="button-add-to-cart">Add to cart</button></a>
					</div>
				</div>
			</div>

	<?php 


		}

	?>

</div>