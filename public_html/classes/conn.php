<?php


    class conn
    {

        public function GetConn(){

            $dbh = new PDO('mysql:host=localhost;dbname=ao_b1k2_oefenen', 'root', '');

            return $dbh;
        }

    }