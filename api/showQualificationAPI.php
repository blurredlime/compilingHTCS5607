<?php
    include_once "../class/Qualification.php";

    $qualification = new Qualification();
    $allQualifications = $qualification->showAllQualifications();
    $qualificationsData = json_encode($allQualifications);
    echo $qualificationsData;

?>