<?php

    if (isset($_POST["candidateID"])){
        include_once "../class/Admin.php";
        $candidateID = $_POST["candidateID"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $streetAddress = $_POST["streetAddress"];
        $suburb = $_POST["suburb"];
        $city = $_POST["city"];
        $emailAddress = $_POST["emailAddress"];
        $phoneNumber = $_POST["phoneNumber"];
        $workType = $_POST["workType"];
        $status = $_POST["status"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $admin = new Admin();
        $admin->updateUserName($candidateID, $firstName, $lastName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $workType, $status, $username, $password);
        $msg = $candidateID." has been updated.";
    } else{
        $msg = "Nothing has been updated";
    }
    $msg = json_encode($msg);
    echo $msg;
?>