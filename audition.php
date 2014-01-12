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

 <body class="audition">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);
 		  	$query = "SELECT * FROM audition";
 		  	$rows = $db->query($query);

		    foreach($rows as $row) {
		      $aud_date = $row["aud_date"];
		      $aud_time = $row["aud_time"];
		      $aud_loc = $row["aud_loc"];
		      $dayone_link = $row["dayone_link"];
		      $daytwo_link = $row["daytwo_link"];
		      $call_date = $row["call_date"];
		      $call_time = $row["call_time"];
		      $call_loc = $row["call_loc"];
		      $eligible = $row["eligible"];
		      $expect = $row["expect"];
		      $next = $row["next"];
		    }  ?>

	  <div class="span1 alpha">
	  	<img src="img/performing1.png" alt="Picture of Ladies First performing">
	  	<h1><div class="text">Next Audition</div></h1>
	  	<p><strong>Date:</strong> <?= $aud_date ?><br>
	    <strong>Time:</strong> <?= $aud_time ?><br>
	    <strong>Location:</strong> <?= $aud_loc ?></p>
		</div>
	  <div class="span1">
	  	<img src="img/handsin.png" alt="Picture of Ladies First">
	  	<h1><div class="text">Online Sign Up</div></h1>
	  	<?php
	  		if($dayone_link == "live") echo '<h3><a href="day.php?num=one">DAY ONE SIGN UP</a></h3>'; else echo "<h3>CLOSED</h3>";
    		if($daytwo_link == "live") echo '<h3><a href="day.php?num=two">DAY TWO SIGN UP</a></h3>'; else echo "<h3>CLOSED</h3>";
    	?>
	  </div>
	  <div class="span1 omega">
	  	<img src="img/performing2.png" alt="Picture of Ladies First performing">
	  	<h1><div class="text">Callback Info</div></h1>
	  	<p><strong>Date:</strong> <?= $call_date ?><br>
	    <strong>Time:</strong> <?= $call_time ?><br>
	    <strong>Location:</strong> <?= $call_loc ?></p>
	  </div>
	  <div class="span3 omega">
	  	<h1><div class="text">You Could Be A Lady!</div></h1>
	  	<h2><div class="text">Are You Eligible?</div></h2>
	  	<?= $eligible ?>
	  	<h2><div class="text">What To Expect?</div></h2>
	  	<?= $expect ?>
	  	<h2><div class="text">What Happens Next?</div></h2>
	  	<?= $next ?>
	  </div>


    <?php require("assets/footer.html"); ?>
 </body>

</html>