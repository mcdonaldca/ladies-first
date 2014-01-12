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

 <body class="contactus">
 	<div class="wrapper">
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
		<h1><div class='text'>Contacts</div></h1>
		<p><strong>General Manager:</strong> <?= $gen_man ?></p>
		<p><strong>Booking Agent:</strong> <?= $book_agent ?></p>
		<p><strong>Press Contact:</strong> <?= $press_con ?></p>
	</div>
	<div class="span2 omega">
		<img src="img/performing3.png" alt="A picture of Ladies First performing">
		<h1><div class='text'>About Us</div></h1>
		<?= $about ?>
	</div>


	<div class="push"></div></div>
  <?php require("assets/footer.html"); ?>
 </body>

</html>