<?php

    if (isset($_POST["vacancyID"])){
        include_once "../class/vacancySkill.php";
        $vacancySkill = new vacancySkill($_POST["vacancyID"],$_POST["skillID"]);
        $newID = $vacancySkill->addVacancySkill($_POST["vacancyID"], $_POST["years"], $_POST["skillID"]);
        $msg = "New skill has been added.";
    } else {
        $msg = "Nothing has been added.";
    }
    $msg = json_encode($msg);
    echo $msg;

?>
