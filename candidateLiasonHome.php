
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
    <div class="addWrapper"></div>
    <div class="reportWrapper"><div class="navBox"><a href="candidateReport.php"><span class="linkSpan"></span></a>Candidate Report</div><div class="navBox"><a href="qualificationsCandidateReport.php"><span class="linkSpan"></span></a>Qualifications Candidate Report</div><div class="navBox"><a href="skillsCandidateReport.php"><span class="linkSpan"></span></a>Skills Candidate Report</div></div>
    <div class="updateWrapper"></div>
    <div class="deleteWrapper"><div class="navBox"><a href="deleteCandidate.php"><span class="linkSpan"></span></a>Delete Candidate</div></div>
</div>
<div class="back1"><?php echo "<a href='javascript:history.go(-1)'><img src='images/back1.png'></a>" ?></div>


</body>
</html>
