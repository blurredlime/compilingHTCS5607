<?php
include_once "DB.php";
include_once "User.php";

class CandidateSkill
{
    var $skillID;
    var $name;
    var $years;
    var $candidateID;
    var $firstName;
    var $lastName;
    private $db;

    function CandidateSkill() {
        $this->skillID = "";
        $this->years = "";
        $this->candidateID = "";
        $this->db = new DB();
    }

    function candidateSkillInformation($skillID, $name, $years, $candidateID) {
        $this->skillID = $skillID;
        $this->name = $name;
        $this->years = $years;
        $this->candidateID = $candidateID;
        $this->db = new DB();
    }

    function skillCandidateInformation($skillID, $candidateID, $firstName, $lastName, $years) {
        $this->skillID = $skillID;
        $this->years = $years;
        $this->candidateID = $candidateID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->db = new DB();
    }
}