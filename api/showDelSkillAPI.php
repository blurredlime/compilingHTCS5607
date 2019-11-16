<?php
include_once "../class/Skill.php";

$skill = new Skill();
$delSkills = $skill->showDeleteSkills();
$skillsData = json_encode($delSkills);
echo $skillsData;

?>