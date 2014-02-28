<!DOCTYPE html>
<html>
 <head>
 	<title>Ladies First</title>
 	<link href='css/normalize.css' rel='stylesheet' type='text/css'>
 	<link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300' rel='stylesheet' type='text/css'>
 	<link href='css/main.css' rel='stylesheet' type='text/css'>
 	<link href='img/favicon.png' rel='icon' type='image/png'>
 </head>

 <body class="contactus">
 	<div class="wrapper cf">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);
 		  	$rows = $db->query("SELECT * FROM general_information");
		    foreach($rows as $row) {
		      $gen_man = $row["gen_man"];
		      $book_agent = $row["book_agent"];
		      $press_con = $row["press_con"];
		      $about = $row["about_us"];
		    } ?>

	<div class="span1 alpha">
		<h1>Contacts</h1>
		<p><b>General Manager:</b> <?= $gen_man ?></p>
		<p><b>Booking Agent:</b> <?= $book_agent ?></p>
		<p><b>Press Contact:</b> <?= $press_con ?></p>
	</div>
	<div class="span2 omega">
		<img src="img/performing3.png" alt="A picture of Ladies First performing">
		<h1>About Us</h1>
		<?= $about ?>
	</div>


  <?php require("assets/footer.html"); ?>
 </body>

</html>