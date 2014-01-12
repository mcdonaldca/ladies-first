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

 <body class="repertoire">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass); ?>

 	<div class="span2 alpha">
 		<h1><div class="text">Repertoire</div></h1>
 		<ul class="song-list cf">
	    <?php 
	      $rows = $db->query('SELECT * FROM repertoire ORDER BY song');
	      foreach ($rows as $row) { ?>   
	      
        <li>
        
        <?php if($row["link"] != "NULL") echo "<a href='" . $row["link"] . "'>";
        echo $row["song"];
        if($row["link"] != "NULL") echo "</a>";
        if($row["artist"] != "NULL") echo " - " . $row["artist"];
        ?>
        
	        <ul><li><strong>
	        
	        <?php
	        if($row["solo"] != "NULL") echo "(SOLO: " . $row["solo"] . ") ";
	        if($row["harm"] != "NULL") echo "(HARM: " . $row["harm"] . ") ";
	        if($row["vp"] != "NULL") echo "(VP: " . $row["vp"] . ") ";
	        if($row["arr"] != "NULL") echo "(ARR: " . $row["arr"] . ") ";
	        if($row["extra"] != "NULL") echo $row["extra"]; ?>
	        
		      </strong></li></ul>

	      </li>

	    <?php } ?>
		</ul>
 	</div>

 	<div class="span1 omega videos">
 		<h1><div class="text">Videos</div></h1>
 		<?php 
	      $rows = $db->query('SELECT * FROM videos ORDER BY id');
	      foreach ($rows as $row) { ?> 
 		<iframe src="//www.youtube.com/embed/<?= $row['video_id'] ?>" frameborder="0" allowfullscreen></iframe>
 		<?php } ?>
 	</div>

 	<div class="span3 omega studio-albums">
 		<h1><div class="text">Studio Albums</div></h1>
 		<table>
	  	<tr>
			  <td><div class="album">
			  	<a href="justdancewithme.php"><img src="img/merch/justdancewithme.png" alt="Just Dance With Me album cover" class="hoverimage"></a>
			  	<div class="hovertitle">Just Dance With Me</div>
			  </div></td>
			  <td><div class="album">
			  	<a href="anolderversionofme.php"><img src="img/merch/anolderversionofme.png" alt="An Older Version of Me album cover" class="hoverimage"></a>
			  	<div class="hovertitle">An Older Version of Me</div>
			  </div></td>
			  <td><div class="album">
			  	<a href="luckbealady.php"><img src="img/merch/luckbealady.png" alt="Luck Be A Lady album cover" class="hoverimage"></a>
			  	<div class="hovertitle">Luck Be A Lady</div>
			  </div></td>
			  <td><div class="album">
			  	<a href="theladiesroom.php"><img src="img/merch/theladiesroom.png" alt="The Ladies Room album cover" class="hoverimage"></a>
			  	<div class="hovertitle">The Ladies Room</div>
			  </div></td>
		  </tr>
	  </table>
 	</div>


    <?php require("assets/footer.html"); ?>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/repertoire.js" type="text/javascript"></script>
 </body>

</html>