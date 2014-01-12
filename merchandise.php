<!DOCTYPE html>
<html>
 <head>
 	<title>Ladies First</title>
 	<link href='css/normalize.css' rel='stylesheet' type='text/css'>
 	<link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300,700' rel='stylesheet' type='text/css'>
 	<link href='css/main.css' rel='stylesheet' type='text/css'>
 	<meta name="viewport" content="width=device-width, initial-scale = 1.0">
 	<link href='img/favicon.png' rel='icon' type='image/png'>
 </head>

 <body class="merchandise">
 	<div class="wrapper">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass); ?>

 	<div class="span3">
 		<h1><div class="text">Online Store</div></h1>
 		<h2><div class="text">T-Shirts</div></h2>
 		<?php
 			$query = 'SELECT * FROM merchandise WHERE type = "shirt" ORDER BY name';
      $rows = $db->query($query);
      foreach($rows as $row) {
      	$price = $row["price"];
      	$tag = $row["tag"];
      	$id = $row["id"];

      ?><a href="merch?id=<?= $id ?>"><div class="lady">
    		<img class="no-js" src="img/merch/<?= $tag ?>_prev.png">
    		<div class="name"><?= $price ?></div>
    	</div></a><?php } ?>
 		<h2><div class="text">Albums</div></h2>
 		<?php
 			$query = 'SELECT * FROM merchandise WHERE type = "album" ORDER BY name';
      $rows = $db->query($query);
      foreach($rows as $row) {
      	$price = $row["price"];
      	$tag = $row["tag"];
      	$id = $row["id"];

      ?><a href="merch?id=<?= $id ?>"><div class="lady">
    		<img class="no-js" src="img/merch/<?= $tag ?>_prev.png">
    		<div class="name"><?= $price ?></div>
    	</div></a><?php } ?>
 		<h2><div class="text">Other</div></h2>
 	</div>


	<div class="push"></div></div>
  <?php require("assets/footer.html"); ?>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/meetus.js"></script>
 </body>

</html>