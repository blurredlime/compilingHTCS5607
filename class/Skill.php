<?php

    include_once "DB.php";
    include_once "User.php";

    class Skill {
        var $skillID;
        var $name;
        var $level;
        private $db;

        function Skill(){
            $this->name = "";
            $this->level = "";
            $this->skillID = 0;
            $this->db = new DB();
        }

        function addSkill($name, $level){
            $this->name = $name;
            $this->level = $level;
            $query = "INSERT INTO skill VALUES (null, '$this->name', '$this->level');";

            mysqli_query($this->db->conn, $query);
            $this->skillID = mysqli_insert_id($this->db->conn);
            return $this->skillID;
        }

        function updateSkill($skillID, $name, $level){
            $query = "UPDATE skill SET name = '$name', level = '$level' WHERE skillID = $skillID;";
            mysqli_query($this->db->conn, $query);
        }

        function showAllskills(){
            $query = "SELECT * FROM skill";
            $result = mysqli_query($this->db->conn, $query);
            $skills = array();
            while ($row = mysqli_fetch_assoc($result)){
                $skill = new Skill();
                $skill->skillInformation($row["skillID"], $row["name"],$row["level"]);
                array_push($skills, $skill);
            }
            return $skills;
        }

        function skillInformation($skillID, $name, $level) {
            $this->skillID = $skillID;
            $this->name = $name;
            $this->level = $level;
        }

        function showSkillCandidates ($skillID) {
            $query = "SELECT * FROM skillcandidate WHERE skillID = ".$skillID;
            $result = mysqli_query($this->db->conn, $query);
            $candidateSkills = array();
            while ($row = $result->fetch_assoc()) {
                $candidateSkill = new CandidateSkill();
                $candidateSkill->skillCandidateInformation($row["skillID"], $row["candidateID"], $row["firstName"], $row["lastName"], $row["years"]);

                array_push($candidateSkills, $candidateSkill);
            }
            return $candidateSkills;
        }

        function showSkillVacancies ($skillID) {
            $query = "SELECT * FROM skillvacancy WHERE skillID = ".$skillID;
            $result = mysqli_query($this->db->conn, $query);
            $skillVacancies = array();
            while ($row = $result->fetch_assoc()) {
                $vacancy = new Vacancy();
                $vacancy->showVacancyCompName2($row["skillID"], $row["vacancyID"], $row["description"], $row["status"], $row["employerID"], $row["companyName"]);
                array_push($skillVacancies, $vacancy);
            }
            return $skillVacancies;
        }

        function showDeleteSkills(){
            $query = "SELECT skilldelete1.skillID, skilldelete1.name, skilldelete1.level FROM skilldelete1 LEFT JOIN vacancyskill ON skilldelete1.skillID = vacancyskill.skillID
            WHERE (((vacancyskill.skillID) Is Null))";
            $result = mysqli_query($this->db->conn, $query);
            $delSkills = array();
            while ($row = mysqli_fetch_assoc($result)){
                $delSkill = new Skill();
                $delSkill->skillInformation($row["skillID"], $row["name"],$row["level"]);
                array_push($delSkills, $delSkill);
            }
            return $delSkills;
        }

        function removeSkill($skillID){
            $query = "DELETE FROM skill WHERE skillID = $skillID;";
            mysqli_query($this->db->conn, $query);
        }
    }


?>