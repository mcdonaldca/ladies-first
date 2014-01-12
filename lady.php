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

 <body class="meetus">
 	<div class="wrapper">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);


 		  	$query = 'SELECT * FROM ladies WHERE id ='. $_GET["id"];
 		  	$rows = $db->query($query);
		    foreach($rows as $row) {
		      $name = $row["first_name"] . ' ' . $row["last_name"];
		      $tag = $row["tag"];
		      $title = $row["title"];
		      $semester = $row["semester"];
		      $year = $row["year"];
		      $major = $row["major"];
		      $color = $row["color"];
		    } ?>

 	<div class="span3 alpha omega">
 		<h1><div class="text"><a href="meetus.php">&lt;&lt; Meet the Ladies</a></div></h1>
 		<div class="span2 alpha">
 			<h2><div class="text"><? echo $name; if($title != "NULL") print ' (' . $title . ')'; ?></div></h2>


		  <p><li><strong>Year:</strong> <?= $year; ?></li>
		     <li><strong>Major:</strong> <?= $major; ?></li>
		     <li><strong>Semester in Ladies:</strong> <?= $semester; ?></li>
		     <li><strong>Color:</strong> <?= $color; ?></li>
		  </p>
 		</div>
 		<div class="span1 omega">
 			<img src="img/ladies/<?= $tag ?>.png" alt="Picture of <?= $name ?>">
 		</div>

 	</div>

 	<div class="push"></div></div>
	<?php require("assets/footer.html"); ?>
 </body>

</html>