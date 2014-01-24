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
		<h1>Events</h1>

		<?php
	    require("../assets/config.php");
	    $db = new PDO("mysql:dbname=$dbname;host=localhost", $dbuser, $dbpass);
	    $rows = $db->query('SELECT * FROM events ORDER BY year DESC, month_num DESC, day DESC, time DESC');
    	$max_id = 0;
    	foreach($rows as $row) { 
      	if($row["id"] > $max_id) {
        	$max_id = $row["id"]; } ?>

    <form action="process.php" method="post">
    <div>
      <input type="hidden" name="id" value="<?= $row["id"] ?>" />
      <select name="day">
        <option <?php if($row["day"] == "01") print "selected" ?>>01</option>
        <option <?php if($row["day"] == "02") print "selected" ?>>02</option>
        <option <?php if($row["day"] == "03") print "selected" ?>>03</option>
        <option <?php if($row["day"] == "04") print "selected" ?>>04</option>
        <option <?php if($row["day"] == "05") print "selected" ?>>05</option>
        <option <?php if($row["day"] == "06") print "selected" ?>>06</option>
        <option <?php if($row["day"] == "07") print "selected" ?>>07</option>
        <option <?php if($row["day"] == "08") print "selected" ?>>08</option>
        <option <?php if($row["day"] == "09") print "selected" ?>>09</option>
        <option <?php if($row["day"] == "10") print "selected" ?>>10</option>
        <option <?php if($row["day"] == "11") print "selected" ?>>11</option>
        <option <?php if($row["day"] == "12") print "selected" ?>>12</option>
        <option <?php if($row["day"] == "13") print "selected" ?>>13</option>
        <option <?php if($row["day"] == "14") print "selected" ?>>14</option>
        <option <?php if($row["day"] == "15") print "selected" ?>>15</option>
        <option <?php if($row["day"] == "16") print "selected" ?>>16</option>
        <option <?php if($row["day"] == "17") print "selected" ?>>17</option>
        <option <?php if($row["day"] == "18") print "selected" ?>>18</option>
        <option <?php if($row["day"] == "19") print "selected" ?>>19</option>
        <option <?php if($row["day"] == "20") print "selected" ?>>20</option>
        <option <?php if($row["day"] == "21") print "selected" ?>>21</option>
        <option <?php if($row["day"] == "22") print "selected" ?>>22</option>
        <option <?php if($row["day"] == "23") print "selected" ?>>23</option>
        <option <?php if($row["day"] == "24") print "selected" ?>>24</option>
        <option <?php if($row["day"] == "25") print "selected" ?>>25</option>
        <option <?php if($row["day"] == "26") print "selected" ?>>26</option>
        <option <?php if($row["day"] == "27") print "selected" ?>>27</option>
        <option <?php if($row["day"] == "28") print "selected" ?>>28</option>
        <option <?php if($row["day"] == "29") print "selected" ?>>29</option>
        <option <?php if($row["day"] == "30") print "selected" ?>>30</option>
        <option <?php if($row["day"] == "31") print "selected" ?>>31</option>
      </select>
      <select name="month">
        <option <?php if($row["month"] == "JAN") print "selected" ?>>JAN</option>
        <option <?php if($row["month"] == "FEB") print "selected" ?>>FEB</option>
        <option <?php if($row["month"] == "MAR") print "selected" ?>>MAR</option>
        <option <?php if($row["month"] == "APR") print "selected" ?>>APR</option>
        <option <?php if($row["month"] == "MAY") print "selected" ?>>MAY</option>
        <option <?php if($row["month"] == "JUN") print "selected" ?>>JUN</option>
        <option <?php if($row["month"] == "JUL") print "selected" ?>>JUL</option>
        <option <?php if($row["month"] == "AUG") print "selected" ?>>AUG</option>
        <option <?php if($row["month"] == "SEP") print "selected" ?>>SEP</option>
        <option <?php if($row["month"] == "OCT") print "selected" ?>>OCT</option>
        <option <?php if($row["month"] == "NOV") print "selected" ?>>NOV</option>
        <option <?php if($row["month"] == "DEC") print "selected" ?>>DEC</option>
      </select>
      <input type="text" id="year" name="year" value="<?= $row["year"] ?>" size="4" />
      <select name="type">
        <option <?php if($row["type"] == "EVENT") print "selected" ?>>EVENT</option>
        <option <?php if($row["type"] == "FUNDRAISER") print "selected" ?>>FUNDRAISER</option>
        <option <?php if($row["type"] == "CONCERT") print "selected" ?>>CONCERT</option>
        <option <?php if($row["type"] == "AUDITIONS") print "selected" ?>>AUDITIONS</option>
      </select>
      <input type="text" name="title" value="<?= $row["title"] ?>" /><br />
      <textarea name="description" rows="6" cols="50"><?= $row["description"] ?></textarea><br />
      <input type="text" name="time" value="<?= $row["time"] ?>" />
      <input type="text" name="location" value="<?= $row["location"] ?>" />
      <input type="text" name="tickets" value="<?= $row["tickets"] ?>" /><br />
      <label><input type="radio" name="category" value="past" <?php if($row["category"] == "past") print "checked"?> />Past Event</label>
      <label><input type="radio" name="category" value="future" <?php if($row["category"] == "future") print "checked"?> />Future Event</label><br />
      <input type="hidden" name="page" value="events" />
      <input type="submit" name="action" value="Update" />
      <input type="submit" name="action" value="Delete" />
    </div>
  </form>
  
    <?php  }
      $max_id = $max_id + 1; ?>
      
  <h1>Add New Event</h1>
  
  <form action="process.php" method="post">
    <div>
    <input type="hidden" name="id" value="<?= $max_id ?>" />
      <select name="day">
        <option selected="selected">01</option>
        <option>02</option>
        <option>03</option>
        <option>04</option>
        <option>05</option>
        <option>06</option>
        <option>07</option>
        <option>08</option>
        <option>09</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        <option>15</option>
        <option>16</option>
        <option>17</option>
        <option>18</option>
        <option>19</option>
        <option>20</option>
        <option>21</option>
        <option>22</option>
        <option>23</option>
        <option>24</option>
        <option>25</option>
        <option>26</option>
        <option>27</option>
        <option>28</option>
        <option>29</option>
        <option>30</option>
        <option>31</option>
      </select>
      <select name="month">
        <option selected="selected">JAN</option>
        <option>FEB</option>
        <option>MAR</option>
        <option>APR</option>
        <option>MAY</option>
        <option>JUN</option>
        <option>JUL</option>
        <option>AUG</option>
        <option>SEP</option>
        <option>OCT</option>
        <option>NOV</option>
        <option>DEC</option>
      </select>
      <input type="text" id="year" name="year" value="Year" size="4" />
      <select name="type">
        <option selected="selected">EVENT</option>
        <option>FUNDRAISER</option>
        <option>CONCERT</option>
        <option>AUDITIONS</option>
      </select>
      <input type="text" name="title" value="Title" /><br />
      <textarea name="description" rows="6" cols="50">Description</textarea><br />
      <input type="text" name="time" value="Time" />
      <input type="text" name="location" value="Location" />
      <input type="text" name="tickets" value="Tickets" /><br />
      <label><input type="radio" name="category" value="past" checked />Past Event</label>
      <label><input type="radio" name="category" value="future" />Future Event</label><br />
      <input type="hidden" name="page" value="events" />
      <input type="submit" name="action" value="Insert" />
    </div>
  </form><br>
		
	</body>
</html>

