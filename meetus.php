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
 		  	require("assets/config.php"); ?>

	<div class='span3'>
	 	<h1><div class='text'>Meet the Ladies</div></h1>

	 	<?php

	 	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);
	 	$query = 'SELECT * FROM ladies ORDER BY last_name';
	 	$rows = $db->query($query);

    foreach($rows as $row) {
    	$name = $row["first_name"] . " " . $row["last_name"];
    	$tag = $row["tag"];
    	$title = $row["title"];
    	$id = $row["id"];
    ?><a href="lady?id=<?= $id ?>"><div class="lady">
    		<img class="no-js" src="img/ladies/<?= $tag ?>.png">
    		<div class="name"><?= $name ?></div>
    		<div class="title"><? if($title != "NULL") echo $title ?></div>
    	</div></a><?php } ?>

	</div>


		<div class="push"></div></div>
    <?php require("assets/footer.html"); ?>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/meetus.js"></script>
 </body>

</html>