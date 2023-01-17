<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Create PDO
require_once $_SERVER["DOCUMENT_ROOT"].'/../config.php';

//include token function
include('./php/token.php');

$token = "";
$saveSuccessful = false;
$planSet = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

    if (validateToken($_POST['token'])) {
        $token = $_POST['token'];
    }

    $saveSuccessful = true;
}

else if (empty($_GET['token']) || !validateToken($_GET['token'])) {
    $token = generateToken();
} else {
    $plan = getToken($_GET['token']);

    if (!empty($plan['token'])) {
        $token = $plan['token'];
        $planSet = $plan;
    }
    else {
        header('location: ../');
    }
}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Student Schedule</title>
</head>

<body>
    <!--H1 Title-->
    <h1 class="mb-auto text-center text-nowrap no-mobile">Student Schedule</h1>
    <!--Form id, action, method-->
    <form id="student_schedule" action="#" method="post">
        <div class="row text-center">
            <input type="text" id="url" value="https://menchaca.cherie.greenriverdev.com/485/Sprint1/student_schedule.php/?token=<?php echo $token; ?>">
            <button onclick="copyURL()">Copy</button>
        </div>
    <!--Starting cards first row-->
        <div class="row">
            <div class="col-sm-5 my-5 mx-auto">
                <div class="card text-white bg-secondary">
                    <h5 class="card-header text-center">Fall</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <textarea name="fall" id="fall"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 my-5 mx-auto">
                <div class="card text-white bg-secondary">
                    <h5 class="card-header text-center">Winter</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <textarea name="winter" id="winter"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--Starting card 2nd row-->
        <div id="card2" class="row">
            <div class="col-sm-5 my-3 mx-auto">
                <div class="card text-white bg-secondary">
                    <h5 class="card-header text-center">Spring</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <textarea name="spring" id="spring"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 my-3 mx-auto">
                <div class="card text-white bg-secondary">
                    <h5 class="card-header text-center">Summer</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <textarea name="summer" id="summer"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--Primary Save Button for all quarters-->
        <div class="bottom-0 end-0 my-2 mx-auto">
            <button type="submit" class="btn-primary float-right">Save</button>
        </div>
    </form>
    <?php


    if ($saveSuccessful) {
        echo $_POST['fall'];
        echo $_POST['winter'];
        echo $_POST['spring'];
        echo $_POST['summer'];

        echo '<script>alert("Submit Successful")</script>';
    }
    else {
        error_log("you messed up you jackass");
    }
    ?>
<script src="js/function.js"></script>
</body>
</html>