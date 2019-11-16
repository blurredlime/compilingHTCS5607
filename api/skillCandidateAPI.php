<?php
include_once "../class/Skill.php";
$skillID = $_GET["skillID"];

$skill = new Skill();
$skillCandidates = $skill->showSkillCandidates($skillID);
$skillData = json_encode($skillCandidates);
echo $skillData;

?>