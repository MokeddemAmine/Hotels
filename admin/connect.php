<?php
    $dsn = 'mysql:host=localhost;dbname=Hotels';
    $user = 'root';
    $pass = '';
    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    
    try{
        $pdo = new PDO($dsn,$user,$pass,$option);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        if(str_contains($e->getMessage(),'Unknown database')){
            // create instance object of PDO class 
            $pdo = new PDO('mysql:host=localhost;dbname=mysql','root','');
            // create database ecommerceShop:
            $db = $pdo->prepare('CREATE DATABASE Hotels');
            $db->execute();
            // redefine instance object with my new database
            $pdo = new PDO($dsn,$user,$pass,$option);
            // create table Users
            $query = $pdo->prepare("CREATE TABLE Users(
                UserID INT AUTO_INCREMENT NOT NULL,
                Username VARCHAR(50) UNIQUE,
                Name VARCHAR(50),
                Email VARCHAR(50) NOT NULL UNIQUE,
                Email_Confirm VARCHAR(20) NOT NULL,
                Password TEXT NOT NULL,
                Password_Update VARCHAR(20),
                Type VARCHAR(10),
                Birthday DATE,
                RegDate DATE DEFAULT now(),
                Lang VARCHAR(20) DEFAULT 'english',
                GroupID SMALLINT DEFAULT 0,
                CONSTRAINT UsersPK PRIMARY KEY (UserID)
            )");
            $query->execute();
        }
    }
?>