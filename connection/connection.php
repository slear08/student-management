<?php
        function  connection(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "student-management";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else{
                return $conn;
            }

    }
?>