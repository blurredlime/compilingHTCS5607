<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Report</title>
    <link rel="stylesheet" type="text/css" href="">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: '../Code/api2/application/showApplicationAPI.php',
                dataType: "JSON",
                success: function (data){
                    console.log(data);
                    $("#produceReport").click(function () {
                        $("#infoDiv").empty();
                        data.forEach(function (application){
                            appendRow = "<div><b>Application ID:</b> " + application.applicationID + "</div>";
                            appendRow += "<div><b>Date:</b> " + application.applicationDate + "</div>";
                            appendRow += "<div><b>Status:</b> " + application.status + "</div>";
                            $("#infoDiv").append(appendRow);

                            $.ajax({
                                type: 'GET',
                                async: false,
                                url: 'api2/application/appCan.php?applicationID=' + application.applicationID,
                                dataType: "JSON",
                                success: function (data) {
                                    url = 'api/application/appCan.php?applicationID=' + application.applicationID;
                                    console.log(data);
                                    data.forEach(function (candidate) {
                                        appendCandi = "<h4>Candidate Details:</h4>";
                                        appendCandi += "<div><b>Candidate ID: </b>" + candidate.candidateID + "</div>";
                                        appendCandi += "<div><b>First Name: </b>" + candidate.firstName + "</div>";
                                        appendCandi += "<div><b>Last Name: </b>" + candidate.lastName + "</div>";
                                        $("#infoDiv").append(appendCandi);
                                    });
                                },
                                error: function () {
                                    console.log('Error: ' + data);
                                }
                            });

                            $.ajax({
                                type: 'GET',
                                async: false,
                                url: 'api2/application/applicationReportAPI.php?applicationID=' + application.applicationID,
                                dataType: "JSON",
                                success: function (data) {
                                    url = 'api/application/applicationReportAPI.php?applicationID=' + application.applicationID;
                                    console.log(data);
                                    data.forEach(function (vacancy) {
                                        appendVacancy = "<h4>Vacancy Details:</h4>";
                                        appendVacancy += "<div><b>Vacancy ID: </b>" + vacancy.vacancyID + "</div>";
                                        appendVacancy += "<div><b>Description: </b>" + vacancy.description + "</div>";
                                        appendVacancy += "<div><b>Status: </b>" + vacancy.status + "</div>";
                                        $("#infoDiv").append(appendVacancy);
                                    });
                                },
                                error: function () {
                                    console.log('Error: ' + data);
                                }
                            });

                            $.ajax({
                                type: 'GET',
                                async: false,
                                url: 'api2/application/appComAPI.php?applicationID=' + application.applicationID,
                                dataType: "JSON",
                                success: function (data) {
                                    url = 'api/application/appComAPI.php?applicationID=' + application.applicationID;
                                    console.log(data);
                                    data.forEach(function (employer) {
                                        appendCom = "<h4>Employer Details: </h4>";
                                        appendCom += "<div><b>Company Name: </b>" + employer.companyName + "</div>";
                                        appendCom += "<hr>";
                                        $("#infoDiv").append(appendCom);
                                    });
                                },
                                error: function () {
                                    console.log('Error: ' + data);
                                }
                            });
                        });
                    });
                },
                error: function () {
                    console.log('Error: ' + data);
                }
            });
        });
    </script>
</head>
<body>
<div id="printBox">
    <h1>Application Report</h1>
    <div class="Box">
        <div id = "infoDiv">
        </div>
    </div>
</div>
<input type="button" id="produceReport" value="Report">
<input type="button" onclick="printBtn('printBox')" value="printReport">
<script>
    function printBtn(el) {
        var restore = $('body').html();
        var printBtn = $('#' + el).clone();
        $('body').empty().html(printBtn);
        window.print();
        $('body').html(restore);
    }    //https://stackoverflow.com/questions/2255291/print-the-contents-of-a-div (Gary Hayes)
</script>
</body>
</html>