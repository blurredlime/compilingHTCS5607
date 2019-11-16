<?php

    include_once "DB.php";
    include_once "User.php";

    class Employer {
        var $employerID;
        var $companyName;
        var $streetAddress;
        var $suburb;
        var $city;
        var $emailAddress;
        var $phoneNumber;
        var $status;
        private $db;

        function Employer(){
            $this->companyName = "";
            $this->streetAddress = "";
            $this->employerID = 0;
            $this->suburb = "";
            $this->city = "";
            $this->emailAddress = "";
            $this->phoneNumber = "";
            $this->status = "";
            $this->db = new DB();
        }

        function addEmployer($companyName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $status){
            $this->companyName = $companyName;
            $this->streetAddress = $streetAddress;
            $this->suburb = $suburb;
            $this->city = $city;
            $this->emailAddress = $emailAddress;
            $this->phoneNumber = $phoneNumber;
            $this->status = $status;
            $query = "INSERT INTO employer VALUES (null, '$this->companyName', '$this->streetAddress', '$this->suburb', '$this->city', '$this->emailAddress', '$this->phoneNumber', '$this->status');";

            mysqli_query($this->db->conn, $query);
            //$this->id = $db->conn->insert_id;
            $this->employerID = mysqli_insert_id($this->db->conn);
            return $this->employerID;
        }

        function updateEmployer($employerID, $companyName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $status){
            $query = "UPDATE employer SET companyName = '$companyName', streetAddress = '$streetAddress', suburb = '$suburb', city = '$city', emailAddress = '$emailAddress', phoneNumber = '$phoneNumber', status = '$status' WHERE employerID = $employerID;";
            mysqli_query($this->db->conn, $query);
        }

        function showAllEmployers(){
            $query = "SELECT * FROM employer";
            $result = mysqli_query($this->db->conn, $query);
            $employers = array();
            while ($row = mysqli_fetch_assoc($result)){
                $employer = new Employer();
                $employer->employerInformation($row["employerID"], $row["companyName"],$row["streetAddress"], $row["suburb"], $row["city"],$row["emailAddress"], $row["phoneNumber"],$row["status"]);
                array_push($employers, $employer);
            }
            return $employers;
        }

        function employerInformation($employerID, $companyName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $status) {
            $this->employerID = $employerID;
            $this->companyName = $companyName;
            $this->streetAddress = $streetAddress;
            $this->suburb = $suburb;
            $this->city = $city;
            $this->emailAddress = $emailAddress;
            $this->phoneNumber = $phoneNumber;
            $this->status = $status;
        }

        function showEmployerVacancies ($employerID) {
            $query = "SELECT * FROM vacancy WHERE employerID = ".$employerID;
            $result = mysqli_query($this->db->conn, $query);
            $empVacancies = array();
            while ($row = $result->fetch_assoc()) {
                $empVacancy = new Vacancy();
                $empVacancy->vacancyInfo($row["vacancyID"], $row["description"], $row["notes"], $row["status"], $row["salary"]);

                array_push($empVacancies, $empVacancy);
            }
            return $empVacancies;
        }

        function showDeleteEmployers(){
            $query = "SELECT employer.employerID, employer.companyName, employer.streetAddress, employer.suburb, employer.city, employer.emailAddress, employer.phoneNumber,  employer.status
            FROM employer LEFT JOIN vacancy ON employer.employerID = vacancy.employerID WHERE (((vacancy.employerID) Is Null));";
            $result = mysqli_query($this->db->conn, $query);
            $delEmployers = array();
            while ($row = mysqli_fetch_assoc($result)){
                $delEmployer = new Employer();
                //echo "id:".$row["employerID"];
                $delEmployer->employerInformation($row["employerID"], $row["companyName"],$row["streetAddress"], $row["suburb"], $row["city"], $row["emailAddress"], $row["phoneNumber"],$row["status"]);
                array_push($delEmployers, $delEmployer);
            }
            return $delEmployers;
        }

        function removeEmployer($employerID){
            $query = "DELETE FROM employer WHERE employerID = $employerID;";
            mysqli_query($this->db->conn, $query);
        }
    }

?>