<?php


    class DB {
        var $conn;
        var $host = "localhost";
        var $dbname = "looking glass";
        var $dbuser = "root";
        var $password = "";

        function DB(){
            $conn = mysqli_connect($this->host, $this->dbuser, $this->password, $this->dbname);
            if (!$conn->connect_error){
                $this->conn =$conn;
    //            echo "connected";
            }else{
                echo $conn->connect_error;
            }
        }
    }


?>