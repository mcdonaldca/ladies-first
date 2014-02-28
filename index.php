<!DOCTYPE html>
<html>
 <head>
  <title>Ladies First</title>
  <link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300' rel='stylesheet' type='text/css'>
  <link href='css/main.css' rel='stylesheet' type='text/css'>
  <link href='img/favicon.png' rel='icon' type='image/png'>
 </head>

 <body class="home">
  <div class="wrapper cf">
	<?php require("assets/header.html");
	  		require("assets/config.php");
	  		$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);

	  		$query = 'SELECT about_main FROM general_information';
	 			$rows = $db->query($query);
			  foreach($rows as $row) {
			    $about = $row["about_main"];
			  } ?>

	  <div class="span3 omega">
	  	<ul class="rslides">
	  		<li><img src="img/iccaquarterfinals1.png" alt=""><div class="caption">ICCA Quarterfinals, Spring 2014</div></li>
			  <li><img src="img/accapalooza11.png" alt=""><div class="caption">Accapalooza, Fall 2011</div></li>
			  <li><img src="img/iccaquarterfinals2.png" alt=""><div class="caption">ICCA Quarterfinals, Spring 2014</div></li>
			  <li><img src="img/superheroesvsvillains.png" alt=""><div class="caption">Superheroes vs. Villains, Fall 2013</div></li>
			</ul>
	  </div>

		<div class="span2 alpha">
			<h1>About</h1>
			<p><?= $about ?></p>
			<h1>Upcoming Events</h1>
			<?php $rows = $db->query('SELECT * FROM events WHERE category = "future" ORDER BY year, month_num, day, time LIMIT 2');
	      		foreach($rows as $row) { ?>

	      
	      <div class="datespace">
		       	<span class="day"><?= $row["day"] ?></span><br />
		       	<span class="month"><?= $row["month"] ?></span>
		      </div>
		       
		      <div class="eventspace">
		      	<h2><?= $row["type"] ?>: <?= $row["title"] ?></h2>
		     		<span class="info"><b>TIME:</b> <?= $row["time"] ?> <b>+++ LOCATION:</b> <?= $row["location"] ?>

		     		<?php if($row["tickets"] != "NULL")
		     					echo "<b>+++ TICKETS:</b> " . $row["tickets"];  ?></span><br />

		        <p><?= $row["description"] ?></p>
		      </div>
	    <?php } ?>
	  </div>

		<div class="span1 omega">
			<h1><a href="http://www.twitter.com/ladiesfirstmsu">Twitter</a></h1>
			<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/LadiesFirstMSU"  data-widget-id="305143131312103424">Tweets by @LadiesFirstMSU</a>
	    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>


	

  
  <?php require("assets/footer.html"); ?>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/slider.js"></script>
  <script type="text/javascript">
	  $(function() {
	    $(".rslides").responsiveSlides({
	    	auto: true,
	    	speed: 350,
	    	timeout: 2500,
	    	pager: true
	    });
	  });
	</script>
 </body>

</html>