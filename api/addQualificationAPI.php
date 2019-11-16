<?php

    if (isset($_POST["name"])){
        include_once "../class/Qualification.php";
        $qualification = new Qualification();
        $newID = $qualification->addQualification($_POST["name"], $_POST["level"]);
        $msg = $newID." has been added.";
    } else {
        $msg = "Nothing has been added.";
    }
    $msg = json_encode($msg);
    echo $msg;

?>
