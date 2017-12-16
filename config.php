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
        
		/*
        //create database
        $sql = "CREATE DATABASE minor_project";

        if($con->query($sql))
            echo "Database has been added";
        else
            echo "Error Creating the Database";
        */
		
		
		/*
		//create table USER
		$sql = "CREATE TABLE user( 
            username VARCHAR(50) NOT NULL,
            password VARCHAR(50) NOT NULL
            )";
			
		if($con->query($sql))
            echo "Table has been added";
        else
            echo "Error Creating the Table";	
		*/

        /*
		//create table PRODUCT
		 $sql = "CREATE TABLE product( 
		 	product_id INT(100),
            description VARCHAR(100),
            qty int(100),
		 	price int(100),
		 	total int(100)
            )";		
			
		if($con->query($sql))
            echo "Table has been added";
        else
            echo "Error Creating the Table";
		*/
		
		/*
		//create table PRODUCT
		 $sql = "CREATE TABLE purchase( 
		 	p_product_id INT(100),
            p_description VARCHAR(100),
            p_qty int(100),
		 	p_price int(100),
		 	p_total int(100)
            )";		
			
		if($con->query($sql))
            echo "Table has been added";
        else
            echo "Error Creating the Table";
		*/

        /*
		//create table transact
		 $sql = "CREATE TABLE transact( 
		 	all_total int(100),
            downpayment int(100),
		 	remaining_bal int(100)
            )";		
			
		if($con->query($sql))
            echo "Table has been added";
        else
            echo "Error Creating the Table";
		*/

        

            /*<?php 
 $date = date('Y-m-d H:i:s');
 echo "Date: ".$date."<br>";
?> */
		
    ?>