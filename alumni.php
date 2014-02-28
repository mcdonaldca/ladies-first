<!DOCTYPE html>
<html>
 <head>
 	<title>Ladies First</title>
 	<link href='css/normalize.css' rel='stylesheet' type='text/css'>
 	<link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300' rel='stylesheet' type='text/css'>
 	<link href='css/main.css' rel='stylesheet' type='text/css'>
 	<link href='img/favicon.png' rel='icon' type='image/png'>
 </head>

 <body class="alumni">
 	<div class="wrapper cf">
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
		<h1>The Naming Of...</h1>
		<?= $naming_of ?>
		<h1>Calling All Alumni</h1>
		<?= $calling_all ?>
	</div>
	<div class="span2 omega">
		<h1>Past Members</h1>
		<?

		$query = 'SELECT * FROM alumni ORDER BY year DESC, season';
		$rows = $db->query($query);
  	
  	foreach($rows as $row) { 
  		$season = $row["season"];
  		$year = $row["year"];
  		$tag = $row["tag"];
  		$id = $row['id'];

  		?><a href="alum.php?id=<?= $id ?>"><div class="hover third">
    		<img class="no-js" src="img/alumni/<?= $tag ?>_prev.png">
    		<div class="title"><?= $season . ' ' . $year ?></div>
    	</div></a><?php } ?>

	</div>


  <?php require("assets/footer.html"); ?>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/hover.js"></script>
 </body>

</html>