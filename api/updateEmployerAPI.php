<?php

if (isset($_POST["employerID"])){
    include_once "../class/Employer.php";
    $employerID = $_POST["employerID"];
    $companyName = $_POST["companyName"];
    $streetAddress = $_POST["streetAddress"];
    $suburb = $_POST["suburb"];
    $city = $_POST["city"];
    $emailAddress = $_POST["emailAddress"];
    $phoneNumber = $_POST["phoneNumber"];
    $status = $_POST["status"];
    $employer = new Employer();
    $employer->updateEmployer($employerID, $companyName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $status);
    $msg = $employerID." has been updated.";
} else{
    $msg = "Nothing has been updated";
}
$msg = json_encode($msg);
echo $msg;
?>