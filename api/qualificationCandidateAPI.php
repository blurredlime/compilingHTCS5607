<?php
include_once "../class/Qualification.php";
$qualificationID = $_GET["qualificationID"];

$qualification = new Qualification();
$qualificationCandidates = $qualification->showQualificationCandidates($qualificationID);
$qualificationData = json_encode($qualificationCandidates);
echo $qualificationData;

?>