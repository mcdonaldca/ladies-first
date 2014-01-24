<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
		<link href="../css/admin.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="header">
		  <?php include("header.html"); ?>
		</div>

		<?php
	    require("../assets/config.php");
	    $db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);

	    $page = strtolower($_POST["page"]);
	    $action = strtolower($_POST["action"]);

	    if( $page != '' || $action != '' ) {

	    	$execute = '';

		    if( $page == "home" ) {
		    	$about = $db->quote(stripslashes($_POST["about"]));
		    	$execute = 'UPDATE general_information SET about_main =' . $about;
		    } else if ( $page == "events" ) {
		    	if( $action == "delete" ) {
		    		$execute = 'DELETE FROM events WHERE id =' . intval($_POST["id"]);
		    	} else {
		    		$id = intval($_POST["id"]);
			      $day = $db->quote(stripslashes($_POST["day"]));
			      $month = $db->quote(stripslashes($_POST["month"]));
			      if($_POST["month"] == "JAN") $month_num = 1;
			      else if($_POST["month"] == "FEB") $month_num = 2;
			      else if($_POST["month"] == "MAR") $month_num = 3;
			      else if($_POST["month"] == "APR") $month_num = 4;
			      else if($_POST["month"] == "MAY") $month_num = 5;
			      else if($_POST["month"] == "JUN") $month_num = 6;
			      else if($_POST["month"] == "JUL") $month_num = 7;
			      else if($_POST["month"] == "AUG") $month_num = 8;
			      else if($_POST["month"] == "SEP") $month_num = 9;
			      else if($_POST["month"] == "OCT") $month_num = 10;
			      else if($_POST["month"] == "NOV") $month_num = 11;
			      else if($_POST["month"] == "DEC") $month_num = 12;
			      $year = $db->quote($_POST["year"]);
			      $type = $db->quote($_POST["type"]);
			      $title = $db->quote(stripslashes($_POST["title"]));
			      $description = $db->quote(stripslashes($_POST["description"]));
			      $time = $db->quote($_POST["time"]);
			      $location = $db->quote(stripslashes($_POST["location"]));
			      $tickets = $db->quote(stripslashes($_POST["tickets"]));
			      $category = $db->quote($_POST["category"]);

			      if( $action == "insert") {
			      	$execute = 'INSERT INTO events VALUES (' . $id . ',' . $day . ',' . $month . ',' . $month_num . ',' . $year . ',' . $type . ',' . $title . ',' . $description . ',' . $time . ',' . $location . ',' . $tickets . ',' . $category . ')';
			      } else if ( $action == "update") {
			      	$execute = 'UPDATE events SET day=' . $day . ', month=' . $month . ', month_num=' . $month_num . ', year=' . $year . ', type=' . $type . ', title=' . $title . ', description=' . $description . ', time=' . $time . ', location=' . $location . ', tickets=' . $tickets . ', category=' . $category . 'WHERE id=' . $id;
			      }
		    	}
		    }

		    $success = false;
		    if( $execute != '' ) {
		    	$success = $db->exec($execute);
		    }

		    if( $success == false ) { ?>
		    	<h1>Invalid</h1>
				  Either your query was invalid, or the database is down.<br>
				  (Please do not refresh page!)

		    <?php } else { ?>		    

				<h1><?= $page ?></h1>
	    	Action Completed<br>
	  		(Please do not refresh page!)

		<?php }  } else { ?>

    	<h1>Invalid</h1>
		 Something's wrong -- go back and try again.<br>
		 (Please do not refresh page!)

  	<?php } ?>
		
	</body>
</html>

