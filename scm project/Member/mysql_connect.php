<?php # Script 7.2 - mysql_connect.php
// set database access

DEFINE ('DB_USER','root');
DEFINE ('DB_PASSWORD' , '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'sneakerscollection');

// make the connection
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to MySQL: ' .  mysqli_connect_error() );

//select the database
@mysqli_select_db($dbc,DB_NAME) OR die ('Could not select the databse: ' . mysqli_connect_error() );

?>
