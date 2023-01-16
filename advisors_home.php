<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Create PDO
require_once $_SERVER["DOCUMENT_ROOT"].'/../config.php';

include('./php/token.php');

$token = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles.css">
    <title> Advise-It Homepage </title>
</head>
<body>
    <h1 class="mb-auto text-center text-nowrap no-mobile"> Advise-It Homepage </h1>
    <div class="position-relative text-center my-5">
        <div class="col mx-2">
            <button class="btn btn-outline-primary">Create New Schedule</button>
        </div>
        <div class="col mx-sm-n3 my-5">
            <label class="token">Token:</label>
            <input type="text">
            <p class="py-0">*If you already have a token please enter here!</p>
        </div>
        <div class="col mx-2">
            <button type="submit" class="btn btn-outline-danger">Submit</button>
        </div>
    </div>
</body>
</html>