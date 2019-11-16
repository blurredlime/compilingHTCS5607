<?php

if (isset($_POST["companyName"])){
    include_once "../class/Employer.php";
    $employer = new Employer();
    $newID = $employer->addEmployer($_POST["companyName"], $_POST["streetAddress"], $_POST["suburb"], $_POST["city"], $_POST["emailAddress"], $_POST["phoneNumber"], $_POST["status"]);
    $msg = $newID." has been added.";
} else {
    $msg = "Nothing has been added.";
}
$msg = json_encode($msg);
echo $msg;

?>
