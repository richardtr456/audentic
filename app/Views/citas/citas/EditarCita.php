<?php 
    include_once("conexion.php");

    $id_usu = $_POST["id_usu"];
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $sexo = $_POST["sexo"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    $id = $_POST["id"];
    $descripcion = $_POST["descripcion"];
    $hora = $_POST["hora"];
    $fecha = $_POST["fecha"];

    $sentencia = $conn -> prepare("UPDATE usuario SET DNI= :dni, nombre_usu= :nombre, apellido_usu= :apellido, sexo= :sexo, telefono= :telefono, correo= :correo WHERE id_usuario= :id_usu;");
    

    $sentencia -> bindParam(':id_usu', $id_usu);
    $sentencia -> bindParam(':dni', $dni);
    $sentencia -> bindParam(':nombre', $nombre);
    $sentencia -> bindParam(':apellido', $apellido);
    $sentencia -> bindParam(':sexo', $sexo);
    $sentencia -> bindParam(':telefono', $telefono);
    $sentencia -> bindParam(':correo', $correo);
//
    $sentencia2 = $conn -> prepare("UPDATE cita SET descripcion_cita= :descripcion, hora= :hora, fecha= :fecha WHERE id_cita= :id;");
    
    
    $sentencia2 -> bindParam(':id', $id);
    $sentencia2 -> bindParam(':descripcion', $descripcion);
    $sentencia2 -> bindParam(':hora', $hora);
    $sentencia2 -> bindParam(':fecha', $fecha);
//
    

    if($sentencia -> execute() AND $sentencia2 -> execute()){
        return header("Location:cita.php");
    }
    else{
        return "error";
    }
?>