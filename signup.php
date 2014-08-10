<!DOCTYPE html>
<html>
 <head>
 	<title>Ladies First</title>
 	<link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300' rel='stylesheet' type='text/css'>
 	<link href='css/main.css' rel='stylesheet' type='text/css'>
 	<link href='img/favicon.png' rel='icon' type='image/png'>
 </head>

 <body>
 	<div class="wrapper cf">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);
 		  	$query = "SELECT day_one, day_two FROM audition";
 		  	$rows = $db->query($query);

		    foreach($rows as $row) { $day_one = $row["day_one"]; $day_two = $row["day_two"]; }

 		  	$auditionees = array();
				$count = 0;

				$lines = "error";
				if( $_POST["date"] == $day_one ) {
					$lines = explode("\n", file_get_contents("auditions/dayone.txt"));
				} else if ( $_REQUEST["date"] == $day_two ) {
					$lines = explode("\n", file_get_contents("auditions/daytwo.txt"));
				}

				// Catch invalid dates
				if( $lines != "error" ) {

				foreach($lines as $line) {
					$auditionees[$count] = explode(':',$line);
					++$count;
				}

				$index = intval($_POST["index"]);

				if( $index == 0 && $_POST["index"] != "0" ) $index = "error";

				// Catch invalid indices
				if( $index !== "error" && 0 <= $index && $index < count($auditionees) ) {

				// Make sure the spot is still open
				if( $auditionees[$index][0] == "open" ) {

				$auditionees[$index][0] = "closed";
				$auditionees[$index][1] = $_POST["name"];
				$auditionees[$index][2] = $_POST["email"];
				$auditionees[$index][3] = $_POST["phone"];

				$count = 0;
				$lines = array();
				foreach($auditionees as $item) {
					$lines[$count] = implode(":",$item);
					++$count;
				}

				if( $_POST["date"] == $day_one ) {
					file_put_contents("auditions/dayone.txt", implode("\n",$lines));
				} else if ( $_REQUEST["date"] == $day_two ) {
					file_put_contents("auditions/daytwo.txt", implode("\n",$lines));
				}

				// First name for friendly dispaly :)
				$first_name = explode(" ", $_POST["name"])[0];?>

	<h1>Wahoo!</h1>
	<p><?= $first_name ?>, your spot has been reserved!</p>


  <?php } else { ?>
  				<h1>Oh, Snap!</h1>
  				<p>Seems like someone beat you to the punch! This timeslot (<?= $_POST["date"] ?> at <?= $_POST["time"] ?>PM) now appears to be taken. <a href="audition.php">Start over</a>?</p>
  <?php } } else { ?>
  				<h1>Whoopsie Daisy</h1>
  				<p>Seems like somehow you've ended up with some invalid information! <a href="audition.php">Start over</a>?</p>
	<?php } } else { ?>
  				<h1>Whoopsie Daisy</h1>
  				<p>Seems like somehow you've ended up with an invalid audition day! <a href="audition.php">Start over</a>?</p>
  <?php }
        require("assets/footer.html"); ?>
 </body>

</html>