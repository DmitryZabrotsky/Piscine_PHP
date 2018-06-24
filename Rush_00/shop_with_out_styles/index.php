<?php include('main.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="description" content="Medieval shop">
	<title>Medieval shop</title>
	<!-- <link rel="stylesheet" href="css/modal.css">
	<link rel="stylesheet" href="css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
	<?php include('header.php'); ?>

	<?php if (!$_GET) {
		echo '<div style="background-image: url(http://www.zbrushcentral.com/attachment.php?attachmentid=522618);" class="coverimg"></div>';
	}?>

	<div class="content">
		<div class="products-row">
			<?php foreach($products as $product) {?>
				<div class="product-card">
					<div class="product-thumbnail">
						<div class="product-stats"><h4><?php echo $product['stats'];?></h4></div>
						<img src="<?php echo $product['img'];?>" alt="">
						<div class="caption">
							<div class="product-price"><h2>&dollar;<?php echo $product['price'];?></h2></div>
							<div class="product-title"><h1><?php echo $product['title'];?></h1></div>
							<div class="product-intro"><h4><?php echo $product['intro'];?></h4></div>
							<div class="button">
							<a href="bascket.php?item=<?php echo $product['id']; ?>"><button class="buy">BUY</button></a>
							<a href="bascket.php?additem=<?php echo $product['id']; ?>"><button class="buy">Add to cart</button></a>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

</body>
</html>
