<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LGRA Application</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
</head>
<body>
<?php
include_once "headerDiv.php";
?>

<div class="menuWrapper">

    <div class="headerWrap"><?php echo $_SESSION['name'] ?> </div>
    <div class="addWrapper"><div class="navBox"><a href="addQualification.php"><span class="linkSpan"></span></a>Add Qualification</div><div class="navBox"><a href="addSkill.php"><span class="linkSpan"></span></a>Add Skill</div></div>
    <div class="reportWrapper"><div class="navBox"><a href="qualificationsReport.php"><span class="linkSpan"></span></a>Qualifications Report</div><div class="navBox"><a href="skillsReport.php"><span class="linkSpan"></span></a>Skills Report</div></div>
    <div class="updateWrapper"><div class="navBox"><a href="updateQualification.php"><span class="linkSpan"></span></a>Update Qualification</div><div class="navBox"><a href="updateSkill"><span class="linkSpan"></span></a>Update Skill</div></div>
    <div class="deleteWrapper"><div class="navBox"><a href="deleteQualification.php"><span class="linkSpan"></span></a>Delete Qualification</div><div class="navBox"><a href="deleteSkill.php"><span class="linkSpan"></span></a>Delete Skill</div></div>
</div>
<div class="back1"><?php echo "<a href='javascript:history.go(-1)'><img src='images/back1.png'></a>" ?></div>


</body>
</html>
