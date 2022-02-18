<?php 
    include_once("conexion.php");
    $sql = $conn->query("SELECT id_cita, b.id_usuario,DNI, nombre_usu, apellido_usu,sexo, telefono,correo, descripcion_cita,b.fecha_ini,estado_cita,btn FROM  cita b INNER JOIN usuario a ON b.id_usuario = a.id_usuario WHERE estado_cita='pendiente' OR estado_cita='confirmado'OR estado_cita='atendido';");
    $citas = $sql->fetchAll(PDO::FETCH_OBJ);
    //print_r($citas);
?>