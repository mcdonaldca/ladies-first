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
 	<?php require("assets/header.html");
 		  	require("assets/config.php"); ?>

	<div class='span3'>
	 	<h1><div class='text'>Meet the Ladies</div></h1>

	 	<?php

	 	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);
	 	$query = 'SELECT * FROM ladies ORDER BY last_name';
	 	$rows = $db->query($query);

    foreach($rows as $row) {
    	$name = $row["first_name"] . " " . $row["last_name"];
    	echo $name;
    ?>

    <?php }


	 	?>

	</div>


    <?php require("assets/footer.html"); ?>
 </body>

</html>