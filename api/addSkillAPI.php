<?php

    if (isset($_POST["name"])){
        include_once "../class/Skill.php";
        $skill = new Skill();
        $newID = $skill->addSkill($_POST["name"], $_POST["level"]);
        $msg = $newID." has been added.";
    } else {
        $msg = "Nothing has been added.";
    }
    $msg = json_encode($msg);
    echo $msg;

?>
