<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once $_SERVER["DOCUMENT_ROOT"].'/../config.php';


//include token function
include('./php/token.php');

$sql = "INSERT INTO advise_it (`tokenID`, `fall`, `winter`, `spring`, `summer`, `date`)
VALUES (':tokenID', ':fall', ':winter', ':spring', ':summer', ':date')";

$statement = $dbh->prepare($sql);
//testing
$tokenID = '';
$fall = '';
$winter = '';
$spring = '';
$summer = '';
$date = '';

$statement->bindParam(':tokenID', $tokenID, PDO::PARAM_STR);
$statement->bindParam(':fall', $fall, PDO::PARAM_STR);
$statement->bindParam(':winter', $winter, PDO::PARAM_STR);
$statement->bindParam(':spring', $spring, PDO::PARAM_STR);
$statement->bindParam(':summer', $summer, PDO::PARAM_STR);
$statement->bindParam(':date', $date, PDO::PARAM_STR);

//4. Execute the statement
$statement->execute();

$token = "";
$formSent = false;
$saveSuccessful = false;
$planSet = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    $formSent = true;

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
    <button href="advisors_home.html" class="btn btn-primary btn-lg ml-5">Back</button>
    <!--H1 Title-->
    <h1 class="mb-auto text-center text-nowra   p no-mobile">Student Schedule</h1>

    <div class="row justify-content-center">
        <input type="text" id="url" value="https://menchaca.cherie.greenriverdev.com/485/Sprint1/student_schedule.php/?token=<?php echo $token; ?>">
        <button onclick="copyURL()">Copy</button>
    </div>
    <!--Form id, action, method-->
    <form id="student_schedule" action="#" method="post">

        <input type="hidden" name="token" value="<?php echo $token ?>">
    <!--Starting cards first row-->
        <div class="row">
            <div class="col-sm-5 my-5 mx-auto">
                <div class="card text-white bg-secondary">
                    <h5 class="card-header text-center">Fall</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <textarea class="justify-content-center" name="fall" id="fall">
                                    <?php
                                    if ($formSent) {
                                        echo $_POST['fall'];
                                    }
                                    else if (!empty($planSet)) {
                                        echo $planSet['fall'];
                                    }
                                    ?>
                                </textarea>
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
                                <textarea name="winter" id="winter">
                                    <?php
                                    if ($formSent) {
                                        echo $_POST['winter'];
                                    }
                                    else if (!empty($planSet)) {
                                        echo $planSet['winter'];
                                    }
                                    ?>
                                </textarea>
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
                                <textarea name="spring" id="spring">
                                    <?php
                                    if ($formSent) {
                                        echo $_POST['spring'];
                                    }
                                    else if (!empty($planSet)) {
                                        echo $planSet['spring'];
                                    }
                                    ?>
                                </textarea>
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
                                <textarea name="summer" id="summer">
                                    <?php
                                    if ($formSent) {
                                        echo $_POST['summer'];
                                    }
                                    else if (!empty($planSet)) {
                                        echo $planSet['summer'];
                                    }
                                    ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--Primary Save Button for all quarters-->
        <div class="bottom-0 end-0 my-2 mx-auto">
            <button type="submit" class="btn btn-primary btn-lg mr-5 float-right">Save</button>
        </div>
    </form>
<script src="js/function.js"></script>
</body>
</html>