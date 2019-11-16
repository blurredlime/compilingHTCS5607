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
                url: 'api/showEmployersAPI.php', // 'http://172.11.11.11/HTCS5607/api/showUsersAPI.php'
                dataType: "JSON",
                success: function (data){
                    console.log(data);
                    data.forEach(function(employer){
                        appendRow = "<h2>Employer Details:</h2>";
                        appendRow += "<p>ID: "+employer.employerID+"</p>";
                        appendRow += "<p>Company Name: "+employer.companyName+"</p>";
                        appendRow += "<p>StreetAddress: "+employer.streetAddress+"</p>";
                        appendRow += "<p>Suburb: "+employer.suburb+"</p>";
                        appendRow += "<p>City: "+employer.city+"</p>";
                        appendRow += "<p>Email Address: "+employer.emailAddress+"</p>";
                        appendRow += "<p>Phone Number: "+employer.phoneNumber+"</p>";
                        appendRow += "<p>Status: "+employer.status+"</p>";
                        $("#infoDiv").append(appendRow);
                        //console.log("employer done");
                        /////vacancy
                        $.ajax({
                            type: 'GET',
                            async: false,
                            url: 'api/employerReportAPI.php?employerID='+employer.employerID,
                            dataType: "JSON",
                            success: function (data){
                                url= 'api/employerReportAPI.php?employerID='+employer.employerID;
                                //console.log(url);
                                console.log(data);
                                data.forEach(function(vacancy){
                                    appendVacancy = "<h4>Vacancy Details:</h4>";
                                    appendVacancy += "<p>ID: "+vacancy.vacancyID+"</p>";
                                    appendVacancy += "<p>Description: "+vacancy.description+"</p>";
                                    appendVacancy += "<p>Status: "+vacancy.status+"</p>";
                                    $("#infoDiv").append(appendVacancy);
                                });
                                //console.log("employer done");
                            },
                            error: function(){
                                console.log('Error: ' + data);
                            }
                        });

                        //////
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
<div id = "infoDiv">

</div>

</body>
</html>