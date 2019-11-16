<?php

include_once "DB.php";
include_once "User.php";

class Admin
{
    var $id;
    var $db;

    public function Admin(){
        $this->id = 0;
        $this->db = new DB();
    }

    function createUser($firstName, $lastName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $workType, $status, $username, $password){
        $newUser = new User();
        $newUser->register($firstName, $lastName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $workType, $status, $username, $password);
    }

    function updateUserName($candidateID, $firstName, $lastName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $workType, $status, $username, $password){
        $newUser = new User();
        $newUser->updateUsersName($candidateID, $firstName, $lastName, $streetAddress, $suburb, $city, $emailAddress, $phoneNumber, $workType, $status, $username, $password);
        //echo "User updated";
    }

    function deleteUser($candidateID){
        $newUser = new User();
        //echo id."here";
        $newUser->removeUser($candidateID);
        //echo "User deleted";
    }

    function showAllusers(){
        $query = "SELECT * FROM candidate";
        $result = mysqli_query($this->db->conn, $query);
        $users = array();
        while ($row = mysqli_fetch_assoc($result)){
            $user = new User();
            //echo "<br><b>ID: ".$row["id"]."</b><br>".
            $user->assignInformation($row["candidateID"], $row["firstName"], $row["lastName"], $row["streetAddress"],$row["suburb"], $row["city"], $row["emailAddress"], $row["phoneNumber"], $row["workType"], $row["status"], $row["username"], $row["password"]);
            array_push($users, $user);
        }
        return $users;
    }
}

?>