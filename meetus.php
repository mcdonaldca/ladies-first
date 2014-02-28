<!DOCTYPE html>
<html>
 <head>
 	<title>Ladies First</title>
 	<link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300' rel='stylesheet' type='text/css'>
 	<link href='css/main.css' rel='stylesheet' type='text/css'>
 	<link href='img/favicon.png' rel='icon' type='image/png'>
 </head>

 <body class="meetus">
 	<div class="wrapper cf">
 	<?php require("assets/header.html");
 		  	require("assets/config.php"); ?>

	<div class='span3'>
	 	<h1>Meet the Ladies</h1>

	 	<?php

	 	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);
	 	$query = 'SELECT * FROM ladies ORDER BY last_name';
	 	$rows = $db->query($query);

    foreach($rows as $row) {
    	$name = $row["first_name"] . " " . $row["last_name"];
    	$tag = $row["tag"];
    	$title = $row["title"];
    	$id = $row["id"];
    ?><a href="lady.php?id=<?= $id ?>"><div class="hover">
    		<img class="no-js" src="img/ladies/<?= $tag ?>.png">
    		<div class="title"><?= $name ?></div>
    		<div class="sub-title"><? if($title != "NULL") echo $title ?></div>
    	</div></a><?php } ?>

	</div>


    <?php require("assets/footer.html"); ?>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/hover.js"></script>
 </body>

</html>