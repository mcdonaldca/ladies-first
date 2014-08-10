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

  <h1>Audition Day One - <?php print $_GET["date"] ?> - <?php print $_GET["time"] ?> PM</h1>
  <p>If you need to change your audition slot after you've signed up, e-mail <a href="mailto:ladies@msu.edu">ladies@msu.edu</a> and we'll help you out!</p>
  <form action="check.php" method="post">
  	<fieldset>
			<legend>Sign Up Info</legend>
  		Your Name:
  		<input type="text" name="name" maxlength="30" value="<?= $_POST["name"] ?>" /><br />
  		Your Email:
  		<input type="text" name="email" maxlength="30" value="<?= $_POST["email"] ?>" /><br />
  		Your Phone Number:
  		<input type="text" name="phone" maxlength="10" id="phone" value="<?= $_POST["phone"] ?>" /><br />
  		<input type="submit" value="Reserve Audition Slot" />
  		<input type="hidden" name="date" value="<?php print $_REQUEST["date"]; ?>" />
  		<input type="hidden" name="time" value="<?php print $_REQUEST["time"]; ?>" />
  		<input type="hidden" name="ind" value ="<?= $_REQUEST["ind"]; ?>" />
  		<input type="hidden" name="day" value ="<?= $_REQUEST["day"]; ?>" />
  	</fieldset>
  </form>

  <?php require("assets/footer.html"); ?>
 </body>

</html>