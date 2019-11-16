<?php
    include_once "../class/Skill.php";

    $skill = new Skill();
    $allSkills = $skill->showAllskills();
    $skillsData = json_encode($allSkills);
    echo $skillsData;

?>