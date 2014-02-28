<!DOCTYPE html>
<html>
 <head>
 	<title>Ladies First</title>
 	<link href='css/normalize.css' rel='stylesheet' type='text/css'>
 	<link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300' rel='stylesheet' type='text/css'>
 	<link href='css/main.css' rel='stylesheet' type='text/css'>
 	<link href='img/favicon.png' rel='icon' type='image/png'>
 </head>

 <body class="merchandise">
 	<div class="wrapper cf">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);

 		  	$query = "SELECT * FROM merchandise WHERE id =" . $_GET["id"];
 		  	$rows = $db->query($query);
			  foreach($rows as $row) { 
			  	$type = $row["type"];
			  	$price = $row["price"];
			  	$name = $row["name"];
			  	$tag = $row["tag"];
			  	$backside = $row["backside"];
			  	$paypal_code = $row["paypal_code"];
			  	$details = $row["details"];
			  }?>

	<div class="span3 alpha omega">
		<h1><?= $name ?></h1>
		<div class="span1 alpha">
			<h2>
			<?php if ($type == "shirt") echo "T-Shirt Design";
						else if ($type == "album") echo "Album Art";
			  		else if ($type == "other") echo "Preview";
			?>
			</h2>
			<img src="img/merch/<?= $tag ?>.png" alt="Picture of <?= $name ?>">
			<? if ($backside == "true") { ?>

			<h2>Back Design</h2>
			<img src="img/merch/<?= $tag ?>_back.png" alt="Picture of backside of <?= $name ?>">

			<?php } ?>
		</div>

		<div class="span1">
			<h2>
		  <?php if ($type == "album") echo "Tracklist";
		  			else echo "Details"; ?>
		  
			</h2>
			<p><?= $details ?></p>
		</div>

		<div class="span1 omega">
			<h2>Purchase</h2>
			<p class="purchase">
				<?= $name ?><br>
				<div class='center'><?= $price ?></div><br>
				<?= $paypal_code ?>
			</p>
		</div>
	</div>

  <?php require("assets/footer.html"); ?>
 </body>

</html>