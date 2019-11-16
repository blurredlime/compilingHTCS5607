<?php
include_once "DB.php";
include_once "User.php";

class CandidateQualification
{
    var $qualificationID;
    var $name;
    var $dateObtained;
    var $instituteName;
    var $candidateID;
    var $firstName;
    var $lastName;
    private $db;

    function CandidateQualification() {
        $this->qualificationID = "";
        $this->dateObtained = "";
        $this->instituteName = "";
        $this->candidateID = "";
        $this->db = new DB();
    }

    function candidateQualificationInformation($qualificationID, $name, $dateObtained, $instituteName, $candidateID) {
        $this->qualificationID = $qualificationID;
        $this->name = $name;
        $this->dateObtained = $dateObtained;
        $this->instituteName = $instituteName;
        $this->candidateID = $candidateID;
        $this->db = new DB();
    }

    function qualificationCandidateInformation($qualificationID, $candidateID, $firstName, $lastName, $dateObtained, $instituteName) {
        $this->qualificationID = $qualificationID;
        $this->dateObtained = $dateObtained;
        $this->instituteName = $instituteName;
        $this->candidateID = $candidateID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->db = new DB();
    }
}