<?php
    include_once "../class/Employer.php";

    $employer = new Employer();
    $allEmployers = $employer->showAllEmployers();
    $employersData = json_encode($allEmployers);
    echo $employersData;

?>