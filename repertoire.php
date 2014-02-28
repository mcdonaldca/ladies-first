<!DOCTYPE html>
<html>
 <head>
 	<title>Ladies First</title>
 	<link href='css/normalize.css' rel='stylesheet' type='text/css'>
 	<link href='http://fonts.googleapis.com/css?family=Anton|Oswald:400,300' rel='stylesheet' type='text/css'>
 	<link href='css/main.css' rel='stylesheet' type='text/css'>
 	<link href='img/favicon.png' rel='icon' type='image/png'>
 </head>

 <body class="repertoire">
 	<div class="wrapper cf">
 	<?php require("assets/header.html");
 		  	require("assets/config.php");
 		  	$db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass); ?>

 	<div class="span2 alpha">
 		<h1>Repertoire</h1>
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
        
	        <ul><li><b>
	        
	        <?php
	        if($row["solo"] != "NULL") echo "(SOLO: " . $row["solo"] . ") ";
	        if($row["harm"] != "NULL") echo "(HARM: " . $row["harm"] . ") ";
	        if($row["vp"] != "NULL") echo "(VP: " . $row["vp"] . ") ";
	        if($row["arr"] != "NULL") echo "(ARR: " . $row["arr"] . ") ";
	        if($row["extra"] != "NULL") echo $row["extra"]; ?>
	        
		      </b></li></ul>

	      </li>

	    <?php } ?>
		</ul>
 	</div>

 	<div class="span1 omega videos">
 		<h1>Videos</h1>
 		<?php 
	      $rows = $db->query('SELECT * FROM videos ORDER BY id');
	      foreach ($rows as $row) { ?> 
 		<iframe src="//www.youtube.com/embed/<?= $row['video_id'] ?>" frameborder="0" allowfullscreen></iframe>
 		<?php } ?>
 	</div>

	<div class="span3 omega studio-albums">
 		<h1>Studio Albums</h1>
	 	<?php
	 			$query = 'SELECT * FROM merchandise WHERE type = "album" ORDER BY name';
	      $rows = $db->query($query);
	      foreach($rows as $row) {
	      	$name = $row["name"];
	      	$tag = $row["tag"];
	      	$id = $row["id"];

    ?><a href="merch?id=<?= $id ?>"><div class="hover">
  		<img class="no-js" src="img/merch/<?= $tag ?>_prev.png">
  		<div class="title"><?= $name ?></div>
  	</div></a><?php } ?>
	</div>


  <?php require("assets/footer.html"); ?>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/hover.js" type="text/javascript"></script>
 </body>

</html>