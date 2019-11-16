<?php
include_once "../class/Skill.php";
$skillID = $_GET["skillID"];

$skill = new Skill();
$skillVacancies = $skill->showSkillVacancies($skillID);
$skillData = json_encode($skillVacancies);
echo $skillData;

?>