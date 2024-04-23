<?php


        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "portfolio";


        if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
        {

            die("!faild to connect to the db!");

        }

?>