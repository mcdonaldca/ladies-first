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
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass); ?>

 	<div class="span3">
 		<h1>Online Store</h1>
 		<h2>T-Shirts</h2>
 		<?php
 			$query = 'SELECT * FROM merchandise WHERE type = "shirt" ORDER BY name';
      $rows = $db->query($query);
      foreach($rows as $row) {
      	$price = $row["price"];
      	$tag = $row["tag"];
      	$id = $row["id"];

      ?><a href="merch.php?id=<?= $id ?>"><div class="hover">
    		<img class="no-js" src="img/merch/<?= $tag ?>_prev.png">
    		<div class="title"><?= $price ?></div>
    	</div></a><?php } ?>
 		<h2>Albums</h2>
 		<?php
 			$query = 'SELECT * FROM merchandise WHERE type = "album" ORDER BY name';
      $rows = $db->query($query);
      foreach($rows as $row) {
      	$price = $row["price"];
      	$tag = $row["tag"];
      	$id = $row["id"];

      ?><a href="merch.php?id=<?= $id ?>"><div class="hover">
    		<img class="no-js" src="img/merch/<?= $tag ?>_prev.png">
    		<div class="title"><?= $price ?></div>
    	</div></a><?php } ?>
 	</div>


  <?php require("assets/footer.html"); ?>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/hover.js"></script>
 </body>

</html>