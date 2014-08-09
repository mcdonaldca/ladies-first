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
 		  	$day = $_GET["num"];

 		  	$query = "error";
 		  	if ( $day == 'one' ) 			$query = "SELECT day_one, day_one_start, day_one_end, day_one_link FROM audition";
				else if ( $day == 'two' ) $query = "SELECT day_two, day_two_start, day_two_end, day_two_link FROM audition";

				// Make sure a valid day has been selected
				if( $query != "error" ) {

				$rows = $db->query($query);
				foreach ($rows as $row) {
					$day_one_live = $row["day_one_link"];
					$day_two_live = $row["day_two_link"];
					if ( $day == 'one' ) {
						$start = $row["day_one_start"]; 
						$end = $row["day_one_end"]; 
						$day = "One"; 
						$aud_date = $row["day_one"];
					} else if ( $day == 'two' ) { 
						$start = $row["day_two_start"]; 
						$end = $row["day_two_end"]; 
						$day = "Two";
						$aud_date = $row["day_two"]; 
					}
				}

				// Validate that the sign up should even be available
				if( ($day == "One" && $day_one_live == "live") || ($day = "Two" && $day_two_live == "live") ) { 

				class Time {
		
					public $time_disp;
					public $hour;
					public $minute;
				
					public function __construct( $time ) { 
						$split = explode(":", $time);
						$this->time_disp = $time;
						$this->hour = intval($split[0]);
						$this->minute = intval($split[1]);
					}
					
					public function add( $val ) {
						$minute_n = $this->minute + $val;
						
						if( $minute_n >= 60 ) {
							$hour_n = $this->hour + 1;
							$minute_n = $minute_n - 60;
						} else {
							$hour_n = $this->hour;
						}
						
						if( $minute_n < 10 ) $minute_n = "0" . $minute_n;
						$time_n = $hour_n . ":" . $minute_n;
						
						return new Time($time_n);
					}
				}

				$start_time = new Time($start);
				$end_time = new Time($end); ?>

	<h1>Day <?= $day ?> Sign Up</h1>
	<p>Click on an open slot to sign up!<br />
     Please sign up for only ONE slot.<br />
     If all slots are full, please email <a href="mailto:ladies@msu.edu">ladies@msu.edu</a></p>

  <?php
				// Set the starting time and add it to array
	      $curr_time = $start_time;
	      $times[0] = $curr_time;
	
				// Initialize variables
				$x = 1;
				$breaks = 0;
	
				// Loop through all times
				while( $curr_time != $end_time ) {

					if( $x % 7 == 0 ) {
						if( $breaks % 2 == 0 ) $curr_time = $curr_time->add(10);
						else $curr_time = $curr_time->add(15);
						$breaks++;

					} else $curr_time = $curr_time->add(5);
		
					$times[$x] = $curr_time;
					$x++;
				}


				$length = count($times);
				$column = $length / 5;
				$rounded = round($column);
	
				if( $column < $rounded ) {
					$column = $rounded;

				} else if( $column > $rounded ) {
					$column = $rounded + 1;
				}
	
				if( $day == "One" ) $lines = explode("\n", file_get_contents("auditions/dayone.txt"));
				else if( $day == "Two" ) $lines = explode("\n", file_get_contents("auditions/daytwo.txt")); ?>

	<table align="center">
		<?php $y = 0;
	 				for( $count = 0; $count < $column * 5; $count++ ) {
		
					// Obtain the reference
					$ref = $count % 5;
		
					// If we're beginning a row
					if( $ref == 0 ) echo "<tr>";
					
					// Calculate which item we're on
					$item = $ref * $column + $y;
		
					if( $item < $length ) {
						$slot_time = $times[$item]->{'time_disp'};
						$url = "reserve.php?date=$aud_date&time=$slot_time&ind=$item&day=$day";
						$info = explode(":", $lines[$item]);
						if( $info[0] == "open" ) {
							echo "<td id='open'><a href='$url'>";
						} else echo '<td>';

						echo $slot_time;
						
						if( $info[0] == "open" ) {
							echo '</a></td>';
						} else echo '</td>';
						
						if( $ref == 4 ) { echo "</tr>"; $y++; }
					}
					
					else { echo "</tr>"; $y++; }
			  
					
				} ?>
  </table>


  <?php // If the day page isn't currently live
				} else { ?>

    <h1>Uh-oh Oreo</h1>
    <p>You shouldn't be here! Auditions may not be currently going on or you may be on the wrong sign up page. <a href="audition.php">Start over</a>?</p>

  <?php // If an invalid day value is in the url
        } } else { ?> 
    <h1>Oh Snap</h1>
    <p>Something appears to have gone awry. <a href="audition.php">Start over</a>?</p>
    
  <?php }
        require("assets/footer.html"); ?>
 </body>

</html>