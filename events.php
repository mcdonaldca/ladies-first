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

 <body class="events">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass); ?>

 	<div class="span2 alpha">
 		<h1>Future Events</h1>
 		<?php $rows = $db->query('SELECT * FROM events WHERE category = "future" ORDER BY year, month_num, day, time');
      		foreach($rows as $row) { ?>

    <div class="datespace">
       	<span class="day"><?= $row["day"] ?></span><br />
       	<span class="month"><?= $row["month"] ?></span>
    </div>
       
    <div class="eventspace">
     	<h2><?= $row["type"] ?>: <?= $row["title"] ?></h2>
     	<span class="info"><strong>TIME:</strong> <?= $row["time"] ?> <strong>+++ LOCATION:</strong> <?= $row["location"] ?>
	   		<?php if($row["tickets"] != "NULL") print("<strong>+++ TICKETS:</strong> " . $row["tickets"]);  ?>
   		</span><br />

       <p><?= $row["description"] ?></p>
    </div>

    <?php } ?>

    <h1>Past Events</h1>
    <?php $rows = $db->query('SELECT * FROM events WHERE category = "past" ORDER BY year, month_num, day, time');
      		foreach($rows as $row) { ?>

    <div class="datespace">
       	<span class="day"><?= $row["day"] ?></span><br />
       	<span class="month"><?= $row["month"] ?></span>
    </div>
       
    <div class="eventspace">
     	<h2><?= $row["type"] ?>: <?= $row["title"] ?></h2>
     	<span class="info"><strong>TIME:</strong> <?= $row["time"] ?> <strong>+++ LOCATION:</strong> <?= $row["location"] ?>
	   		<?php if($row["tickets"] != "NULL") print("<strong>+++ TICKETS:</strong> " . $row["tickets"]);  ?>
   		</span><br />

       <p><?= $row["description"] ?></p>
    </div>

    <?php } ?>

    


 	</div>

 	<div class="span1 omega">
 		<h1>Twitter</h1>
 	</div>


    <?php require("assets/footer.html"); ?>
 </body>

</html>