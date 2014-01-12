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
  <div class="wrapper">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass); ?>

 	<div class="span2 alpha">
 		<h1><div class="text">Future Events</div></h1>
 		<?php
      $query = 'SELECT * FROM events WHERE category = "future" ORDER BY year, month_num, day, time';
      $rows = $db->query($query);
      foreach($rows as $row) { ?>

    <div class=" event cf">
      <div class="datespace">
         	<span class="day"><?= $row["day"] ?></span><br />
         	<span class="month"><?= $row["month"] ?></span>
      </div>
         
      <div class="eventspace">
       	<h2><div class="text"><?= $row["type"] ?>: <?= $row["title"] ?></div></h2>
       	<span class="info"><strong>TIME:</strong> <?= $row["time"] ?> <strong>+++ LOCATION:</strong> <?= $row["location"] ?>
  	   		<?php if($row["tickets"] != "NULL") echo("<strong>+++ TICKETS:</strong> " . $row["tickets"]);  ?>
     		</span><br />

         <p><?= $row["description"] ?></p>
      </div>
    </div>  

    <?php } ?>

    <h1><div class="text">Past Events</div></h1>
    <?php $rows = $db->query('SELECT * FROM events WHERE category = "past" ORDER BY year, month_num, day, time');
      		foreach($rows as $row) { ?>
    <div class="event cf">
      <div class="datespace">
         	<span class="day"><?= $row["day"] ?></span><br />
         	<span class="month"><?= $row["month"] ?></span>
      </div>
         
      <div class="eventspace">
       	<h2><div class="text"><?= $row["type"] ?>: <?= $row["title"] ?></div></h2>
       	<span class="info"><strong>TIME:</strong> <?= $row["time"] ?> <strong>+++ LOCATION:</strong> <?= $row["location"] ?>
  	   		<?php if($row["tickets"] != "NULL") echo("<strong>+++ TICKETS:</strong> " . $row["tickets"]);  ?>
     		</span><br />

         <p><?= $row["description"] ?></p>
      </div>
    </div>

    <?php } ?>

    


 	</div>

 	<div class="span1 omega">
 		<h1><div class="text">Twitter</div></h1>
 		<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/LadiesFirstMSU"  data-widget-id="305143131312103424">Tweets by @LadiesFirstMSU</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
 	</div>

  <div class="push"></div></div>
  <?php require("assets/footer.html"); ?>
 </body>

</html>