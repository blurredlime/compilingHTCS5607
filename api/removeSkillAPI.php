<?php

if (isset($_GET["skillID"])){
    include_once "../class/Skill.php";
    $skill = new Skill();
    $skill->removeSkill($_GET["skillID"]);
    $msg = $_GET["skillID"]." has been removed.";
} else {
    $msg = "Nothing has been removed.";
}

$msg = json_encode($msg);
echo $msg;

?>