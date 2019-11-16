<?php
include_once "../class/Qualification.php";
$qualificationID = $_GET["qualificationID"];

$qualification = new Qualification();
$qualificationVacancies = $qualification->showQualificationVacancies($qualificationID);
$qualificationData = json_encode($qualificationVacancies);
echo $qualificationData;

?>