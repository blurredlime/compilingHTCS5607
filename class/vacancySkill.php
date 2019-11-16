<?php
include_once "DB.php";

class vacancySkill
{
    var $vacancyID;
    var $status;
    var $years;
    var $skillID;
    private $db;

    function vacancySkill($vacancyID, $skillID) {
        $this->vacancyID = $vacancyID;
        $this->years = "";
        $this->skillID = $skillID;
        $this->db = new DB();
    }

    function addVacancySkill($vacancyID, $years, $skillID){
        $this->vacancyID = $vacancyID;
        $this->years = $years;
        $this->skillID = $skillID;
        $query = "INSERT INTO vacancyskill VALUES ('$this->vacancyID', '$this->years', '$this->skillID');";

        mysqli_query($this->db->conn, $query);
        $this->vacancyID = mysqli_insert_id($this->db->conn);
        return $this->vacancyID;
    }
}