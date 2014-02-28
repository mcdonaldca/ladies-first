<!DOCTYPE html>
<html>
 <head>
 	<title>Ladies First</title>
 	<link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300' rel='stylesheet' type='text/css'>
  <link href='css/main.css' rel='stylesheet' type='text/css'>
 	<link href='img/favicon.png' rel='icon' type='image/png'>
 </head>

 <body class="events">
  <div class="wrapper cf">
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
       	<span class="info"><b>TIME:</b> <?= $row["time"] ?> <b>+++ LOCATION:</b> <?= $row["location"] ?>
  	   		<?php if($row["tickets"] != "NULL") echo("<b>+++ TICKETS:</b> " . $row["tickets"]);  ?>
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
       	<span class="info"><b>TIME:</b> <?= $row["time"] ?> <b>+++ LOCATION:</b> <?= $row["location"] ?>
  	   		<?php if($row["tickets"] != "NULL") echo("<b>+++ TICKETS:</b> " . $row["tickets"]);  ?>
     		</span><br />

         <p><?= $row["description"] ?></p>
      </div>
    </div>

    <?php } ?>

    


 	</div>

 	<div class="span1 omega">
 		<h1><div class="text">Twitter</div></h1>
 		<a class="twitter-timeline" href="https://twitter.com/LadiesFirstMSU" data-widget-id="305703443002179585">Tweets by @LadiesFirstMSU</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
 	</div>

  <?php require("assets/footer.html"); ?>
 </body>

</html>