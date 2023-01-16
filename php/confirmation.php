<?php
// error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Move form data into variables
$spring = $_POST['spring'];
$summer = $_POST['summer'];
$fall = $_POST['fall'];
$winter = $_POST['winter'];
$date = $_POST['date'];
$time = $_POST['time'];
$token = $_POST['token'];

//display data on confirm page
echo "<p><b>Spring:</b> $spring </p>";
echo "<p><b>Summer: </b>$summer </p>";
echo "<p><b>Fall: </b>$fall </p>";
echo "<p><b>Winter: </b>$winter </p>";
echo "<p><b>date & time: </b>$date $time </p>";

include("connect_sprint1.php");
?>
