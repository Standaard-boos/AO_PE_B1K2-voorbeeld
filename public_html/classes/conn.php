<?php


    class conn
    {

        public function GetConn(){

            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "ao_b1k2_oefenen";

            // Create connection
            $conn = new mysqli($servername, $username, $password , $database);

            return $conn;
        }

    }