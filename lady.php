<!DOCTYPE html>
<html>
 <head>
 	<title>Ladies First</title>
 	<link href='css/normalize.css' rel='stylesheet' type='text/css'>
 	<link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300' rel='stylesheet' type='text/css'>
 	<link href='css/main.css' rel='stylesheet' type='text/css'>
 	<link href='img/favicon.png' rel='icon' type='image/png'>
 </head>

 <body class="meetus">
 	<div class="wrapper cf">
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
 		<h1><a href="meetus.php">&lt;&lt; Meet the Ladies</a></h1>
 		<div class="span2 alpha">
 			<h2><? echo $name; if($title != "NULL") print ' (' . $title . ')'; ?></h2>


		  <p><li><b>Year:</b> <?= $year; ?></li>
		     <li><b>Major:</b> <?= $major; ?></li>
		     <li><b>Semester in Ladies:</b> <?= $semester; ?></li>
		     <li><b>Color:</b> <?= $color; ?></li>
		  </p>
 		</div>
 		<div class="span1 omega">
 			<img src="img/ladies/<?= $tag ?>.png" alt="Picture of <?= $name ?>">
 		</div>

 	</div>

	<?php require("assets/footer.html"); ?>
 </body>

</html>