<?php
    include_once "../class/Skill.php";

    $skillID = $_GET["skillID"];
    $skill = new Skill();
    $skillInfo = $skill->viewSkillbyID($skillID);
    $skillData = json_encode($skillInfo);
    echo $skillData;

?>