<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
		<link href="../css/admin.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="header">
		  <?php include("header.html"); ?>
		</div>

		<?php
	    require("../assets/config.php");
	    $db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);
	    $rows = $db->query("SELECT * FROM general_information");
	    foreach($rows as $row) {
	      $about = $row["about_main"];
	    }
	  ?>
	  
	  <h1>Home</h1>
	  <form action="process.php" method="post" >
	    <div>
	      "About" Section Content:<br />
	      <textarea rows="6" cols="50" name="about"><?= $about ?></textarea><br>
	      <input type="hidden" name="page" value="home">
	      <input type="submit" name="action" value="update">
	    </div>
	  </form>
		
	</body>
</html>

