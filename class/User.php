<?php

    include_once "DB.php";
    include_once "Skill.php";
    include_once "Qualification.php";
    include_once "Employer.php";
    include_once "Vacancy.php";
    include_once "vacancySkill.php";
    include_once "CandidateSkill.php";
    include_once "CandidateQualification.php";

    class User {
        var $candidateID;
        var $firstName;
        var $lastName;
        var $streetAddress;
        var $suburb;
        var $city;
        var $emailAddress;
        var $phoneNumber;
        var $workType;
        var $status;
        var $username;
        var $password;
        private $db;

        function User(){
            $this->firstName = "";
            $this->lastName = "";
            $this->streetAddress = "";
            $this->suburb = "";
            $this->city = "";
            $this->emailAddress = "";
            $this->phoneNumber = "";
            $this->workType = "";
            $this->status = "";
            $this->username = "";
            $this->password = "";
            $this->candidateID = 0;
            $this->db = new DB();
        }

        function register($firstName, $lastName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $workType, $status, $username, $password){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->streetAddress = $streetAddress;
            $this->suburb = $suburb;
            $this->city = $city;
            $this->emailAddress = $emailAddress;
            $this->phoneNumber = $phoneNumber;
            $this->workType = $workType;
            $this->status = $status;
            $this->username = $username;
            $this->password = $password;
            $query = "INSERT INTO candidate VALUES (null, '$this->firstName', '$this->lastName', '$this->streetAddress', '$this->suburb', '$this->city', '$this->emailAddress', '$this->phoneNumber', '$this->workType', '$this->status', '$this->username', '$this->password');";

            mysqli_query($this->db->conn, $query);
            $this->candidateID = mysqli_insert_id($this->db->conn);
            return $this->candidateID;
        }

        function updateUsersName($candidateID, $firstName, $lastName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $workType, $status, $username, $password) {
            $query = "UPDATE candidate SET firstName = '$firstName', lastName = '$lastName', streetAddress = '$streetAddress', suburb = '$suburb', city = '$city', emailAddress = '$emailAddress', phoneNumber = '$phoneNumber', workType = '$workType', status = '$status', username = '$username', password = '$password' WHERE candidateID = $candidateID;";
            mysqli_query($this->db->conn, $query);
           // echo "Updated";
        }

        function removeUser($candidateID){
            $query = "DELETE FROM candidate WHERE candidateID = $candidateID;";
            mysqli_query($this->db->conn, $query);
        }

        function removeCandidateSkill($candidateID){
            $query = "DELETE FROM candidateskill WHERE candidateID = $candidateID;";
            mysqli_query($this->db->conn, $query);
        }

        function removeCandidateQualification($candidateID){
            $query = "DELETE FROM candidatequalification WHERE candidateID = $candidateID;";
            mysqli_query($this->db->conn, $query);
        }

        function assignInformation($candidateID, $firstName, $lastName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $workType, $status, $username, $password){
            $this->candidateID = $candidateID;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->streetAddress = $streetAddress;
            $this->suburb = $suburb;
            $this->city = $city;
            $this->emailAddress = $emailAddress;
            $this->phoneNumber = $phoneNumber;
            $this->workType = $workType;
            $this->status = $status;
            $this->username = $username;
            $this->password = $password;
        }

        function login($username, $password) {
            $query = "SELECT candidateID FROM candidate WHERE username = '$username'";
            $result = mysqli_query($this->db->conn, $query);
            if ($result->num_rows >0) {
                $query = "SELECT firstName FROM candidate WHERE password = '$password'";
                $result = mysqli_query($this->db->conn, $query);
                while ($row = $result->fetch_assoc()) {
                    return $row["firstName"];
                }
                return null;
            } else {
                return null;
            }
        }

        function showCandidateSkills ($candidateID) {
            $query = "SELECT * FROM candidateskillname WHERE candidateID = ".$candidateID;
            $result = mysqli_query($this->db->conn, $query);
            $candidateSkills = array();
            while ($row = $result->fetch_assoc()) {
                $candidateSkill = new CandidateSkill();
                $candidateSkill->candidateSkillInformation($row["skillID"], $row["name"], $row["years"], $row["candidateID"]);

                array_push($candidateSkills, $candidateSkill);
            }
            return $candidateSkills;
        }

        function showCandidateQualifications ($candidateID) {
            $query = "SELECT * FROM candidatequalificationname WHERE candidateID = ".$candidateID;
            $result = mysqli_query($this->db->conn, $query);
            $candidateQualifications = array();
            while ($row = $result->fetch_assoc()) {
                $candidateQualification = new CandidateQualification();
                $candidateQualification->candidateQualificationInformation($row["qualificationID"], $row["name"], $row["dateObtained"], $row["instituteName"], $row["candidateID"]);

                array_push($candidateQualifications, $candidateQualification);
            }
            return $candidateQualifications;
        }

        function showDeleteCandidates(){
            $query = "SELECT candidate.candidateID, candidate.firstName, candidate.lastName, candidate.streetAddress, candidate.suburb, candidate.city, candidate.emailAddress,  candidate.phoneNumber, candidate.workType, candidate.status, candidate.username, candidate.password
            FROM candidate LEFT JOIN application ON candidate.candidateID = application.candidateID WHERE (((application.candidateID) Is Null));";
            $result = mysqli_query($this->db->conn, $query);
            $delCandidates = array();
            while ($row = mysqli_fetch_assoc($result)){
                $delCandidate = new User();
                $delCandidate->assignInformation($row["candidateID"], $row["firstName"], $row["lastName"], $row["streetAddress"], $row["suburb"], $row["city"], $row["emailAddress"], $row["phoneNumber"], $row["workType"], $row["status"], $row["username"], $row["password"]);
                array_push($delCandidates, $delCandidate);
            }
            return $delCandidates;
        }
    }

    ?>