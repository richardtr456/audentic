<?php 

$server="localhost";
$user="root";
$pass="123357";
$database="Consultorio";

//$conn = mysqli_connect($server,$user,$pass,$database);

//if(!$conn)
//{
//    die("Conexión fallida");
//}

try{
    $conn = new PDO("mysql:host = $server; dbname=".$database,$user,$pass);
    //echo"<script> alert('Conexión exitosa')</script>";
} catch(Exception $e){
    echo"<script> alert('Error al conectarse')</script>".$e->getMessage($conn);
}

?>