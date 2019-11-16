<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vacancy Report</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: 'api2/showVacancyAPI.php',
                dataType: "JSON",
                success:function (data) {
                    console.log(data);
                    $("#produceReport").click(function(){
                        $("#infoDiv").empty();
                        data.forEach(function(vacancy) {
                            appendRow = "<h2>Vacancy Details:</h2>";
                            appendRow += "<div><b>Vacancy ID: </b>" + vacancy.vacancyID + "</div>";
                            appendRow += "<div><b>Description: </b>" + vacancy.description + "</div>";
                            appendRow += "<div><b>Notes: </b>" + vacancy.notes + "</div>";
                            appendRow += "<div><b>Status: </b>" + vacancy.status + "</div>";
                            appendRow += "<div><b>Salary: </b>" + vacancy.salary + "</div>";
                            $("#infoDiv").append(appendRow);

                            $.ajax({
                                type: 'GET',
                                async: false,
                                url: 'api2/vacancyCompanyAPI.php?vacancyID=' + vacancy.vacancyID ,
                                dataType: "JSON",
                                success: function (data) {
                                    url = 'api2/vacancyCompanyAPI.php?vacancyID=' + vacancy.vacancyID;
                                    console.log(data);
                                    data.forEach(function (employer) {
                                        appendEmploy = "<h4>Employer Details: </h4>";
                                        appendEmploy += "<div><b>Company Name: </b>" + employer.companyName + "</div>";
                                        $("#infoDiv").append(appendEmploy);
                                    });
                                },
                                error: function (){
                                    console.log('Error: '+ data);
                                }
                            });
                            $.ajax({
                                type: 'GET',
                                async: false,
                                url: 'api2/vacancyReportAPI.php?vacancyID=' + vacancy.vacancyID,
                                dataType: "JSON",
                                success: function (data) {
                                    url = 'api2/vacancyReportAPI.php?vacancyID=' + vacancy.vacancyID;
                                    console.log(data);
                                    data.forEach(function (qualification) {
                                        appendQuali = "<h4>Qualification Details</h4>";
                                        appendQuali += "<div><b>Qualification Name:</b>" + qualification.name + "</div>";
                                        appendQuali += "<div><b>Level</b>" + qualification.level + "</div>";
                                        appendQuali += "<hr>";
                                        $("#infoDiv").append(appendQuali);
                                    });
                                },
                                error: function (){
                                    console.log('Error: '+ data);
                                }
                            });
                        });
                    });
                },
                erreo: function(){
                    console.log('Error: ' + data);
                }
            });
        });
    </script>
</head>
<body>
<div id="printBox">
    <h1>Vacancy Report</h1>
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