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

 		  	$query = "SELECT * FROM alumni WHERE id =" . $_GET["id"];
 		  	$rows = $db->query($query);
			  foreach($rows as $row) {
			    $season = $row["season"];
			    $year = $row["year"];
			    $tag = $row["tag"];
			    $members = $row["members"];
			  } ?>

	<div class="span3 alpha omega">
		<h1><div class="text"><a href="alumni.php">&lt;&lt; Past Members</a></div></h1>
	  <div class="span2 alpha">
	    <h2><div class="text"><?= $season ?> <?= $year ?></div></h2>
	    <br />
	    <img src="img/alumni/<?= $tag ?>.png" alt="Picture of Ladies First alumni from <?= $season ?> <?= $year ?>"><br><br>
	  </div>
	  <div class="span1 omega">
	    <h2><div class="text">Members</div></h2>
	    <?= $members ?>
	  </div>
	</div>


	<div class="push"></div></div>
  <?php require("assets/footer.html"); ?>
 </body>

</html>