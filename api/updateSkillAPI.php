<?php

    if (isset($_POST["skillID"])){
        include_once "../class/Skill.php";
        $skillID = $_POST["skillID"];
        $name = $_POST["name"];
        $level = $_POST["level"];
        $skill = new Skill();
        $skill->updateSkill($skillID, $name, $level);
        $msg = $skillID." has been updated.";
    } else{
        $msg = "Nothing has been updated";
    }
    $msg = json_encode($msg);
    echo $msg;
?>