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
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);
 		  	$query = "SELECT * FROM audition";
 		  	$rows = $db->query($query);

		    foreach($rows as $row) {
		      $aud_date = $row["aud_date"];
		      $aud_time = $row["aud_time"];
		      $aud_loc = $row["aud_loc"];
		      $day_one_link = $row["day_one_link"];
		      $day_two_link = $row["day_two_link"];
		      $call_date = $row["call_date"];
		      $call_time = $row["call_time"];
		      $call_loc = $row["call_loc"];
		      $eligible = $row["eligible"];
		      $expect = $row["expect"];
		      $next = $row["next"];
		    }  ?>

	  <div class="span1 alpha">
	  	<img src="img/performing1.png" alt="Picture of Ladies First performing">
	  	<h1>Next Audition</h1>
	  	<p><b>Date:</b> <?= $aud_date ?><br>
	    <b>Time:</b> <?= $aud_time ?><br>
	    <b>Location:</b> <?= $aud_loc ?></p>
		</div>
	  <div class="span1">
	  	<img src="img/handsin.png" alt="Picture of Ladies First">
	  	<h1>Online Sign Up</h1>
	  	<?php
	  		if($day_one_link == "live") echo '<h3><a href="day.php?num=one">DAY ONE SIGN UP</a></h3>'; else echo "<h3>CLOSED</h3>";
    		if($day_two_link == "live") echo '<h3><a href="day.php?num=two">DAY TWO SIGN UP</a></h3>'; else echo "<h3>CLOSED</h3>";
    	?>
	  </div>
	  <div class="span1 omega">
	  	<img src="img/performing2.png" alt="Picture of Ladies First performing">
	  	<h1>Callback Info</h1>
	  	<p><b>Date:</b> <?= $call_date ?><br>
	    <b>Time:</b> <?= $call_time ?><br>
	    <b>Location:</b> <?= $call_loc ?></p>
	  </div>
	  <div class="span3 omega">
	  	<h1>You Could Be A Lady!</h1>
	  	<h2>Are You Eligible?</h2>
	  	<?= $eligible ?>
	  	<h2>What To Expect?</h2>
	  	<?= $expect ?>
	  	<h2>What Happens Next?</h2>
	  	<?= $next ?>
	  </div>

  <?php require("assets/footer.html"); ?>
 </body>

</html>