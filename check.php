<!DOCTYPE html>
<html>
 <head>
 	<title>Ladies First</title>
 	<link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300' rel='stylesheet' type='text/css'>
 	<link href='css/main.css' rel='stylesheet' type='text/css'>
 	<link href='img/favicon.png' rel='icon' type='image/png'>
 </head>

 <body class="audition">
 	<div class="wrapper cf">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass); ?>

  <h1>Verify Information</h1>

	<p class="check"><strong>Name:</strong> <?= $_POST["name"]; ?><br />
	<strong>Email:</strong> <?= $_POST["email"]; ?><br />
	<strong>Phone:</strong> <?= $_POST["phone"]; ?><br />
	<strong>Date:</strong> <?= $_POST["date"]; ?><br />
	<strong>Time:</strong> <?= $_POST["time"]; ?> PM</p>

	<p class="options">
		Is this information correct?
		<form action="signup.php" method="post">
			<input type="submit" value="Yes, it is correct">
			<input type="hidden" name="name" value="<?= $_POST["name"]; ?>">
	    <input type="hidden" name="email" value="<?= $_POST["email"]; ?>">
	    <input type="hidden" name="phone" value="<?= $_POST["phone"]; ?>">
	    <input type="hidden" name="date" value="<?= $_POST["date"]; ?>">
	    <input type="hidden" name="time" value="<?= $_POST["time"]; ?>">
	    <input type="hidden" name="ind" value="<?= $_POST["ind"]; ?>">
	    <input type="hidden" name="day" value="<?= $_POST["day"]; ?>">
		</form>
		<form action="reserve.php" method="post">
			<input type="submit" value="No, I made a mistake">
			<input type="hidden" name="name" value="<?= $_POST["name"]; ?>">
	    <input type="hidden" name="email" value="<?= $_POST["email"]; ?>">
	    <input type="hidden" name="phone" value="<?= $_POST["phone"]; ?>">
			<input type="hidden" name="date" value="<?= $_POST["date"]; ?>">
	    <input type="hidden" name="time" value="<?= $_POST["time"]; ?>">
	    <input type="hidden" name="ind" value="<?= $_POST["ind"]; ?>">
	    <input type="hidden" name="day" value="<?= $_POST["day"]; ?>">
		</form>
		<form action="index.php">
			<input type="submit" value="No, I changed my mind">
		</form>
	</p>

  <?php require("assets/footer.html"); ?>
 </body>

</html>