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
            $query = $pdo->prepare('CREATE TABLE Users_Plus(
                UserID INT AUTO_INCREMENT NOT NULL,
                Bio TEXT,
                Gender VARCHAR(10),
                Mobile VARCHAR(15),
                Address TEXT,
                Emergency_Contact VARCHAR(30),
                Payments VARCHAR(50),
                CONSTRAINT UsersPlusPK PRIMARY KEY (UserID),
                CONSTRAINT UserIDFK FOREIGN KEY (UserID) REFERENCES Users (UserID)
            )');
            $query->execute();
            $query = $pdo->prepare('CREATE TABLE Hotels(
                HotelID INT AUTO_INCREMENT NOT NULL,
                Name	VARCHAR(50) NOT NULL,
                Description	TEXT,
                Country VARCHAR(30) NOT NULL,
                State VARCHAR(30) NOT NULL,
                City VARCHAR(30) NOT NULL,
                Street TEXT NOT NULL,
                Languages TEXT NOT NULL,
                Size INT NOT NULL,
                Photos TEXT NOT NULL,
                UserID INT NOT NULL,
                CONSTRAINT HotelsPK PRIMARY KEY (HotelID),
                CONSTRAINT UserIDhotelFK FOREIGN KEY (UserID) REFERENCES Users (UserID) 
            )');
            $query->execute();
            $query = $pdo->prepare('CREATE TABLE Rooms (
                RoomID INT AUTO_INCREMENT NOT NULL,
                Type VARCHAR(20) NOT NULL,
                Description TEXT NOT NULL,
                Beds TINYINT DEFAULT 1,
                Kitchens TINYINT DEFAULT 1,
                Bathrooms TINYINT DEFAULT 1,
                Photo   TEXT,
                Price FLOAT NOT NULL,
                Currency VARCHAR(5) NOT NULL,
                rate Float,
                HotelID INT NOT NULL,
                CONSTRAINT RoomPK PRIMARY KEY (RoomID),
                CONSTRAINT ROOMFK FOREIGN KEY (HotelID) REFERENCES Hotels (HotelID) ON UPDATE CASCADE ON DELETE CASCADE
            )');
            $query->execute();
            $query = $pdo->prepare('CREATE TABLE Amenities(
                AmenityID INT AUTO_INCREMENT NOT NULL,
                Wifi TINYINT DEFAULT 0,
                Breakfast TINYINT DEFAULT 0,
                Parking TINYINT DEFAULT 0,
                Fitness TINYINT DEFAULT 0,
                Pool    TINYINT DEFAULT 0,
                24H_FrontDesk TINYINT DEFAULT 0,
                RoomService TINYINT DEFAULT 0,
                Housekeeping TINYINT DEFAULT 0,
                AirConditioning TINYINT DEFAULT 0,
                InRoom TINYINT DEFAULT 0,
                BusinessCenter TINYINT DEFAULT 0,
                Restaurant TINYINT DEFAULT 0,
                PetFriendly TINYINT DEFAULT 0,
                Laundry TINYINT DEFAULT 0,
                HotelID INT NOT NULL,
                CONSTRAINT AmenitiesPK PRIMARY KEY (AmenityID),
                CONSTRAINT AmenitiesFK FOREIGN KEY (HotelID) REFERENCES Hotels (HotelID) ON UPDATE CASCADE ON DELETE CASCADE
            )');
            $query->execute();
        }
    }
?>