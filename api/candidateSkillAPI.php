<?php
include_once "../class/User.php";
$candidateID = $_GET["candidateID"];

$user = new User();
$candidateSkills = $user->showCandidateSkills($candidateID);
$candidateData = json_encode($candidateSkills);
echo $candidateData;

?>