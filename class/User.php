<?php

    include_once "DB.php";
    include_once "Skill.php";
    include_once "Qualification.php";
    include_once "Employer.php";
    include_once "Vacancy.php";
    include_once "vacancySkill.php";
    include_once "CandidateSkill.php";
    include_once "CandidateQualification.php";

class User
{
    var $id;
    var $name;
    var $email;
    var $username;
    var $password;
    var $rank;
    private $db;

    function User(){
        $this->name = "";
        $this->email = "";
        $this->username = "";
        $this->password = "";
        $this->rank = "";
        $this->id = 0;
        $this->db = new DB();
    }

    function register($name, $email, $username, $password){
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $query = "INSERT INTO users VALUES (null, '$this->name', '$this->email', '$this->username', '$this->password');";
        echo $query;
        mysqli_query($this->db->conn, $query);
        $this->id = mysqli_insert_id($this->db->conn);
        return $this->id;
    }

    function updateUsersName($id, $name){
        $query = "UPDATE users SET name = '$name' WHERE id = $id;";
        mysqli_query($this->db->conn, $query);
        echo "Updated";
    }

    function removeUser($id){
        $query = "delete from users where id = $id;";
        mysqli_query($this->db->conn, $query);
        //echo $id." has been deleted";
    }

    function asignInformation($id, $name, $email, $username, $rank, $password){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->rank = $rank;
        $this->password = $password;
    }

    function login($username, $password){
        $query = "select * from users where username = '$username'";
        $result = mysqli_query($this->db->conn, $query);
        while ($row = $result->fetch_assoc()){
            if ($password == $row["password"]){
                $this->asignInformation($row["id"], $row["name"], $row["email"], $row["username"], $row["rank"], $row["password"]);
            }
        }

    }

}
?>
