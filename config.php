<?php
        $server = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "minor_project";

        //create a connection 
        $con = new mysqli($server,$user,$pass,$dbname);
        //evaluate connection
        if($con->connect_errno)
            die("Could'nt Connect: " . $con-> connect_error);
?>
