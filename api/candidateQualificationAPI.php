<?php
include_once "../class/User.php";
$candidateID = $_GET["candidateID"];

$user = new User();
$candidateQualifications = $user->showCandidateQualifications($candidateID);
$candidateData = json_encode($candidateQualifications);
echo $candidateData;

?>