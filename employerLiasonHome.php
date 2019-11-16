
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
    <div class="addWrapper"><div class="navBox"><a href="addEmployer.php"><span class="linkSpan"></span></a>Add Employer</div><div class="navBox"><a href="addVacancy.php"><span class="linkSpan"></span></a>Add Vacancy</div><div class="navBox"><a href="addSkillToVacancy.php"><span class="linkSpan"></span></a>Add Skill to Vacancy</div></div>
    <div class="reportWrapper"><div class="navBox"><a href="employerReport.php"><span class="linkSpan"></span></a>Employer Report</div><div class="navBox"><a href="vacanciesReport.php"><span class="linkSpan"></span></a>Vacancies Report</div><div class="navBox"><a href="applicationsReport.php"><span class="linkSpan"></span></a>Applications Report</div><div class="navBox"><a href="skillsVacancyReport.php"><span class="linkSpan"></span></a>Skills Vacancy Report</div><div class="navBox"><a href="qualificationsVacancyReport.php"><span class="linkSpan"></span></a>Qualifications Vacancy Report</div></div>
    <div class="updateWrapper"><div class="navBox"><a href="updateEmployer.php"><span class="linkSpan"></span></a>Update Employer</div><div class="navBox"><a href="updateVacancy.php"><span class="linkSpan"></span></a>Update Vacancy</div><div class="navBox"><a href="markVacancyAsFilled.php"><span class="linkSpan"></span></a>Mark a Vacancy as Filled</div></div>
    <div class="deleteWrapper"><div class="navBox"><a href="deleteEmployer.php"><span class="linkSpan"></span></a>Delete Employer</div><div class="navBox"><a href="deleteVacancy.php"><span class="linkSpan"></span></a>Delete Vacancy</div><div class="navBox"><a href="removeSkillFromVacancy.php"><span class="linkSpan"></span></a>Remove Skill from Vacancy</div></div>
</div>
<div class="back1"><?php echo "<a href='javascript:history.go(-1)'><img src='images/back1.png'></a>" ?></div>


</body>
</html>