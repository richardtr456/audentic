<?php
$host     = 'localhost';
$username = 'root';
$password = '123357';
$dbname   ='Consultorio';

$conn = new mysqli($host, $username, $password, $dbname);
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}