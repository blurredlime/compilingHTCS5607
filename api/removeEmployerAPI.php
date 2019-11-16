<?php

if (isset($_GET["employerID"])){
    include_once "../class/Employer.php";
    $employer = new Employer();
    $employer->removeEmployer($_GET["employerID"]);
    $msg = $_GET["employerID"]." has been removed.";
} else {
    $msg = "Nothing has been removed.";
}

$msg = json_encode($msg);
echo $msg;

?>