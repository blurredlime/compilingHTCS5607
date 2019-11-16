<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employer Report</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: 'api2/showEmployerAPI.php', // 'http://172.11.11.11/HTCS5607/api/showUsersAPI.php'
                dataType: "JSON",
                success: function (data){
                    console.log(data);
                    $("#produceReport").click(function(){
                        $("#infoDiv").empty();
                        data.forEach(function(employer) {
                            appendRow = "<h2>Employer Details:</h2>";
                            appendRow += "<div><b>Employer ID: </b>" + employer.employerID + "</div>";
                            appendRow += "<div><b>Company Name: </b>" + employer.companyName + "</div>";
                            appendRow += "<div><b>StreetAddress: </b>" + employer.streetAddress + "</div>";
                            appendRow += "<div><b>Suburb: </b>" + employer.suburb + "</div>";
                            appendRow += "<div><b>City: </b>" + employer.city + "</div>";
                            appendRow += "<div><b>Email Address: </b>" + employer.emailAddress + "</div>";
                            appendRow += "<div><b>Phone Number: </b>" + employer.phoneNumber + "</div>";
                            appendRow += "<div><b>Status: </b>" + employer.status + "</div>";
                            $("#infoDiv").append(appendRow);
                            //console.log("employer done");
                            /////vacancy
                            $.ajax({
                                type: 'GET',
                                async: false,
                                url: 'api2/employerReportAPI.php?employerID=' + employer.employerID,
                                dataType: "JSON",
                                success: function (data) {
                                    url = 'api2/employerReportAPI.php?employerID=' + employer.employerID;
                                    //console.log(url);
                                    console.log(data);
                                    data.forEach(function (vacancy) {
                                        appendVacancy = "<h4>Vacancy Details:</h4>";
                                        appendVacancy += "<div><b>ID: </b>" + vacancy.vacancyID + "</div>";
                                        appendVacancy += "<div><b>Description: </b>" + vacancy.description + "</div>";
                                        appendVacancy += "<div><b>Status: </b>" + vacancy.status + "</div>";
                                        $("#infoDiv").append(appendVacancy);
                                    });
                                    //console.log("employer done");
                                },
                                error: function () {
                                    console.log('Error: ' + data);
                                }
                            });
                        });
                    });
                },
                error: function(){
                    console.log('Error: ' + data);
                }
            });
        });
    </script>
</head>
<body>
<div id="printBox">
<h1>Employer Report</h1>
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