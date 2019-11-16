<?php
include_once "../class/Employer.php";

$employer = new Employer();
$delEmployers = $employer->showDeleteEmployers();
$employersData = json_encode($delEmployers);
echo $employersData;

?>