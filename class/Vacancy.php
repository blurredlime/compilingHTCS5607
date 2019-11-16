<?php

include_once "DB.php";
include_once "User.php";

class Vacancy {
    var $vacancyID;
    var $description;
    var $notes;
    var $status;
    var $salary;
    var $qualificationID;
    var $employerID;
    var $companyName;
    var $skillID;
    private $db;

    function Vacancy(){
        $this->description = "";
        $this->notes = "";
        $this->vacancyID = 0;
        $this->status = "";
        $this->salary = "";
        $this->db = new DB();
    }

    function addVacancy($description, $notes, $status, $salary, $employerID, $qualificationID){
        $this->description = $description;
        $this->notes = $notes;
        $this->status = $status;
        $this->salary = $salary;
        $this->employerID = $employerID;
        $this->qualificationID = $qualificationID;
        $query = "INSERT INTO vacancy VALUES (null, '$this->description', '$this->notes', '$this->status', '$this->salary', '$this->employerID', '$this->qualificationID');";

        mysqli_query($this->db->conn, $query);
        //$this->id = $db->conn->insert_id;
        $this->vacancyID = mysqli_insert_id($this->db->conn);
       // return $this->vacancyID;
    }

    function updateVacancy($vacancyID, $description, $notes, $status, $salary){
        $query = "UPDATE vacancy SET description = '$description', notes = '$notes', status = '$status', salary = '$salary' WHERE vacancyID = $vacancyID;";
        mysqli_query($this->db->conn, $query);
    }

    function markFilled($vacancyID, $status){
        $query = "UPDATE vacancy SET status = '$status' WHERE vacancyID = $vacancyID;";
        mysqli_query($this->db->conn, $query);
    }

    function showAllVacancies(){
        $query = "SELECT * FROM vacancy ";
        $result = mysqli_query($this->db->conn, $query);
        $vacancies = array();
        while ($row = mysqli_fetch_assoc($result)){
            $vacancy = new Vacancy();
            $vacancy->vacancyInfo($row["vacancyID"], $row["description"],$row["notes"], $row["status"], $row["salary"], $row["qualificationID"], $row["employerID"]);
            array_push($vacancies, $vacancy);
        }
        return $vacancies;
    }

    function vacancyInfo($vacancyID, $description, $notes, $status, $salary, $qualificationID, $employerID) {
        $this->vacancyID = $vacancyID;
        $this->description = $description;
        $this->notes = $notes;
        $this->status = $status;
        $this->salary = $salary;
        $this->qualificationID = $qualificationID;
        $this->employerID = $employerID;
    }

    function vacancyInformation($vacancyID, $description, $notes, $status, $salary, $qualificationID, $employerID, $companyName) {
        $this->vacancyID = $vacancyID;
        $this->description = $description;
        $this->notes = $notes;
        $this->status = $status;
        $this->salary = $salary;
        $this->qualificationID = $qualificationID;
        $this->employerID = $employerID;
        $this->companyName = $companyName;
    }

    function vacancyDelInformation($vacancyID, $description, $notes, $status, $salary) {
        $this->vacancyID = $vacancyID;
        $this->description = $description;
        $this->notes = $notes;
        $this->status = $status;
        $this->salary = $salary;
    }

    function showVacancyCompName ($vacancyID, $description, $status, $qualificationID, $employerID, $companyName) {
        $this->vacancyID = $vacancyID;
        $this->description = $description;
        $this->status = $status;
        $this->qualificationID = $qualificationID;
        $this->employerID = $employerID;
        $this->companyName = $companyName;
    }

    function showVacancyCompName2 ($vacancyID, $description, $status, $skillID, $employerID, $companyName) {
        $this->vacancyID = $vacancyID;
        $this->description = $description;
        $this->status = $status;
        $this->skillID = $skillID;
        $this->employerID = $employerID;
        $this->companyName = $companyName;
    }

    function showCurrentVacancies(){
        $query = "SELECT * FROM vacancy WHERE vacancy.status = 'Current'";
        $result = mysqli_query($this->db->conn, $query);
        $vacancies = array();
        while ($row = mysqli_fetch_assoc($result)){
            $vacancy = new Vacancy();
            $vacancy->vacancyInfo($row["vacancyID"], $row["description"],$row["notes"], $row["status"], $row["salary"]);
            array_push($vacancies, $vacancy);
        }
        return $vacancies;
    }

    function showDeleteVacancies(){
        $query = "SELECT vacancy.vacancyID, vacancy.description, vacancy.notes, vacancy.status, vacancy.salary
        FROM vacancy LEFT JOIN application ON vacancy.vacancyID = application.vacancyID WHERE (((application.vacancyID) Is Null));";
        $result = mysqli_query($this->db->conn, $query);
        $delVacancies = array();
        while ($row = mysqli_fetch_assoc($result)){
            $delVacancy = new Vacancy();
            $delVacancy->vacancyDelInformation($row["vacancyID"], $row["description"], $row["notes"], $row["status"], $row["salary"]);
            array_push($delVacancies, $delVacancy);
        }
        return $delVacancies;
    }

    function removeVacancy($vacancyID){
        $query = "DELETE FROM vacancy WHERE vacancyID = $vacancyID;";
        mysqli_query($this->db->conn, $query);
    }

    function removeVacancySkill($vacancyID){
        $query = "DELETE FROM vacancyskill WHERE vacancyID = $vacancyID;";
        mysqli_query($this->db->conn, $query);
    }
}

?>