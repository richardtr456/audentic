<?php 
require_once('db-connect.php');

if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No hay datos para guardar.'); location.replace('./') </script>";
    $conn->close();
    exit;
}

    $dni = $_POST["dni"];
    $descripcion = $_POST["descripcion"];
    $fecha_ini = $_POST["fecha_ini"];
    $fecha_fin = $fecha_ini;
    $estado = "pendiente";

//extract($_POST);

//$allday = isset($allday);

    $fechaEntera = strtotime($fecha_ini);
    $hora = date("H", $fechaEntera);

    $sql = $conn->query("SELECT * FROM usuario WHERE DNI = '$dni';");    
    $total = mysqli_num_rows($sql);
    
    if($total>0){
        $schedules = $conn->query("SELECT id_usuario FROM usuario WHERE DNI = '$dni';");
        foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
            $id_usuario = $row['id_usuario'];
        }
        $sql = "INSERT INTO `cita` (`id_usuario`,`descripcion_cita`,`fecha_ini`,`fecha_fin`,`estado_cita`) VALUES ('$id_usuario','$descripcion','$fecha_ini','$fecha_fin','$estado')";
    }else{
        echo "<script> alert('Datos invalidos :('); location.replace('./') </script>";
    }


$save = $conn->query($sql);
if($save){
    echo "<script> alert('Evento Guardado Correctamente.'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>