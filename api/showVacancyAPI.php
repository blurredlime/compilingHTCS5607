<?php
    include_once "../class/Vacancy.php";

    $vacancy = new Vacancy();
    $allVacancies = $vacancy->showAllVacancies();
    $vacancysData = json_encode($allVacancies);
    echo $vacancysData;

?>