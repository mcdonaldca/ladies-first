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
 	<?php require("assets/header.html"); ?>

  <h1>Audition - <?php print $_REQUEST["date"] ?> - <?php print $_REQUEST["time"] ?> PM</h1>
  <p>If you need to change your audition slot after you've signed up, e-mail <a href="mailto:ladies@msu.edu">ladies@msu.edu</a> and we'll help you out!</p>
  <form action="check.php" method="post">
  	<fieldset>
			<legend>Sign Up Info</legend>
  		Your Name:
  		<input type="text" name="name" maxlength="30" value="<?= $_POST["name"] ?>" /><br />
  		Your Email:
  		<input type="text" name="email" maxlength="32" value="<?= $_POST["email"] ?>" /><br />
  		Your Phone Number:
  		<input type="text" name="phone" maxlength="10" id="phone" value="<?= $_POST["phone"] ?>" /><br />
  		<input type="submit" value="Reserve Audition Slot" />
  		<input type="hidden" name="date" value="<?= $_REQUEST["date"]; ?>" />
  		<input type="hidden" name="time" value="<?= $_REQUEST["time"]; ?>" />
  		<input type="hidden" name="index" value ="<?= $_REQUEST["index"]; ?>" />
  	</fieldset>
  </form>

  <?php require("assets/footer.html"); ?>
 </body>

</html>