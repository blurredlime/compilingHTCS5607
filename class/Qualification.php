<?php

    include_once "DB.php";
    include_once "User.php";

    class Qualification {
        var $qualificationID;
        var $name;
        var $level;
        private $db;

        function Qualification(){
            $this->name = "";
            $this->level = "";
            $this->qualificationID = 0;
            $this->db = new DB();
        }

        function addQualification($name, $level){
            $this->name = $name;
            $this->level = $level;
            $query = "INSERT INTO qualification VALUES (null, '$this->name', '$this->level');";

            mysqli_query($this->db->conn, $query);
            //$this->id = $db->conn->insert_id;
            $this->qualificationID = mysqli_insert_id($this->db->conn);
            return $this->qualificationID;
        }

        function updateQualification($qualificationID, $name, $level){
            $query = "UPDATE qualification SET name = '$name', level = '$level' WHERE qualificationID = $qualificationID;";
            mysqli_query($this->db->conn, $query);
        }

        function showAllQualifications(){
            $query = "SELECT * FROM qualification";
            $result = mysqli_query($this->db->conn, $query);
            $qualifications = array();
            while ($row = mysqli_fetch_assoc($result)){
                $qualification = new Qualification();
                $qualification->qualificationInformation($row["qualificationID"], $row["name"], $row["level"]);
                array_push($qualifications, $qualification);
            }
            return $qualifications;
        }

        function qualificationInformation($qualificationID, $name, $level) {
            $this->qualificationID = $qualificationID;
            $this->name = $name;
            $this->level = $level;
        }

        function showQualificationVacancies ($qualificationID) {
            $query = "SELECT * FROM qualificationvacancy WHERE qualificationID = ".$qualificationID;
            $result = mysqli_query($this->db->conn, $query);
            $qualificationVacancies = array();
            while ($row = $result->fetch_assoc()) {
                $qualificationVacancy = new Vacancy();
                $qualificationVacancy->showVacancyCompName($row["vacancyID"], $row["description"], $row["status"], $row["qualificationID"], $row["employerID"], $row["companyName"]);

                array_push($qualificationVacancies, $qualificationVacancy);
            }
            return $qualificationVacancies;
        }

        function showQualificationCandidates ($qualificationID) {
            $query = "SELECT * FROM qualificationcandidate WHERE qualificationID = ".$qualificationID;
            $result = mysqli_query($this->db->conn, $query);
            $candidateQualifications = array();
            while ($row = $result->fetch_assoc()) {
                $candidateQualification = new CandidateQualification();
                $candidateQualification->qualificationCandidateInformation($row["qualificationID"], $row["candidateID"], $row["firstName"], $row["lastName"], $row["dateObtained"], $row["instituteName"]);

                array_push($candidateQualifications, $candidateQualification);
            }
            return $candidateQualifications;
        }

        function showDeleteQualifications(){
            $query = "SELECT qualificationdelete1.qualificationID, qualificationdelete1.name, qualificationdelete1.level
            FROM qualificationdelete1 LEFT JOIN vacancy ON qualificationdelete1.qualificationID = vacancy.qualificationID
            WHERE (((vacancy.qualificationID) Is Null))";
            $result = mysqli_query($this->db->conn, $query);
            $delQualifications = array();
            while ($row = mysqli_fetch_assoc($result)){
                $delQualification = new Qualification();
                $delQualification->qualificationInformation($row["qualificationID"], $row["name"],$row["level"]);
                array_push($delQualifications, $delQualification);
            }
            return $delQualifications;
        }

        function removeQualification($qualificationID){
            $query = "DELETE FROM qualification WHERE qualificationID = $qualificationID;";
            mysqli_query($this->db->conn, $query);
        }
    }


?>