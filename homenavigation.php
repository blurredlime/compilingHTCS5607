<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LGRA Application</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/homenavigation.css">
</head>
<body>

<?php //thinking we can have some code that will include the navigation menu that corresponds to the correct employee login
        // for example we have something like if $_SESSION['name'] = 'candidateliason' {include_once 'navCan.html'}
include_once 'headerDiv.php';
include_once 'navCan.html';
include_once 'navEmp.html';
include_once 'navIT.html';
?>

</body>
</html>