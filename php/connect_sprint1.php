<?php
//Turn on error reporting put at the top
ini_set('display_errors', 1);
error_reporting(E_ALL);


//Connect to Database
$username = "menchaca_grcuser";
$password = "HIwarrior12";
$hostname = "localhost";
$database = "menchaca_grc";

$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die("<p>Oops! We weren't able to connect to the database</p>");

