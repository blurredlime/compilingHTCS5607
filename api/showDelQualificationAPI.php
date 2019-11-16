<?php
include_once "../class/Qualification.php";

$qualification = new Qualification();
$delQualifications = $qualification->showDeleteQualifications();
$qualificationsData = json_encode($delQualifications);
echo $qualificationsData;

?>