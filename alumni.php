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

 <body>
 	<div class="wrapper">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass); 

 		  	$query = "SELECT * FROM general_information";
 		  	$rows = $db->query($query);
			  foreach($rows as $row) {
			    $naming_of = $row["naming_of"];
			    $calling_all = $row["calling_all"];
			  } ?>

	<div class="span1 alpha">
		<h1><div class="text">The Naming Of...</div></h1>
		<?= $naming_of ?>
		<h1><div class="text">Calling All Alumni</div></h1>
		<?= $calling_all ?>
	</div>
	<div class="span2 omega">
		<h1><div class="text">Past Members</div></h1>
		<?

		$query = 'SELECT * FROM alumni ORDER BY year DESC, season';
		$rows = $db->query($query);
  	
  	foreach($rows as $row) { 
  		$season = $row["season"];
  		$year = $row["year"];
  		$tag = $row["tag"];
  		$id = $row['id'];

  		?><a href="alum.php?id=<?= $id ?>"><div class="lady alum">
    		<img class="no-js" src="img/alumni/<?= $tag ?>_prev.png">
    		<div class="name"><?= $season . ' ' . $year ?></div>
    	</div></a><?php } ?>

	</div>


	<div class="push"></div></div>
  <?php require("assets/footer.html"); ?>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/meetus.js"></script>
 </body>

</html>