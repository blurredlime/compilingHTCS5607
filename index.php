<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Page</title>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#headerDiv').load("headerDiv.php");
            $('#loginDiv').load("loginForm.php");
            $('#contDiv').load("myDocument.php");

        });

        $(document).ready(function(){
            function lookLeft() {
                $('#bannerL').animate({left: "-=590"}, 10000, "swing", lookRight)
            }
            function lookRight(){
                $('#bannerL').animate({left: "+=590"}, 10000, "swing", lookLeft)
            }
            lookLeft();
        });

        $(document).ready(function(){
            function lookLeft() {
                $('#bannerR').animate({left: "-=590"}, 10000, "swing", lookRight)
            }
            function lookRight(){
                $('#bannerR').animate({left: "+=590"}, 10000, "swing", lookLeft)
            }
            lookLeft();
        });

    </script>
    <script>
        $(document).ready(function(){
            $('p').click(function(){
                alert('This is the log-in page, if you have forgotten your log-in credentials please talk to the IT Department.')
            });
        });
    </script>

    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/homenavigation.css">

</head>
<body>

<div id = "header">

    <div id = "headerbanner"><img src = "images/logo.png" id = "lgralogo">
        <h1>Looking Glass Recruitment Agency</h1>
    </div>

</div>
<div id = "indexbody">
    <h1 style="position: relative; left: -15%;">Log-In</h1>

    <div id = "loginDiv">Login</div>

</div>
<div id = "contDiv">Content</div>
<div class = "sidebanner">
    <div class="bannerLcontainer"><img id="bannerL" src="images/lookingL.png"></div>
    <div class="bannerRcontainer"><img id="bannerR" src="images/lookingR.png"></div>
</div>

<div class="help"><p>?</p></div>

</html>