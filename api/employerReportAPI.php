<?php
include_once "../class/Employer.php";
$employerID = $_GET["employerID"];

$employer = new Employer();
$employerVacancies = $employer->showEmployerVacancies($employerID);
$employersData = json_encode($employerVacancies);
echo $employersData;

?>