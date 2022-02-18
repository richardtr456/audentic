<?php 
    include_once("conexion.php");

    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $sexo = $_POST["sexo"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    //
    $descripcion = $_POST["descripcion"];
    //$hora = $_POST["hora"];
    $fecha_ini = $_POST["fecha_ini"];
    $fecha_fin = $fecha_ini;
    $estado = "pendiente";

    $fechaEntera = strtotime($fecha_ini);
    $hora = date("H", $fechaEntera);

    $sql = $conn->query("SELECT * FROM usuario WHERE DNI = '$dni';");
    $count = $sql->rowCount();
    if($count>0){
        echo "Ya existe el numero";

        $citas = $sql->fetchAll(PDO::FETCH_OBJ);   
        foreach($citas as $cita) { $id_usu = $cita->id_usuario; }

        $fechaEntera = strtotime($fecha_ini);
        $hora = date("H", $fechaEntera);

        $sentencia = $conn -> prepare("INSERT INTO cita(id_usuario,descripcion_cita,hora,fecha_ini,fecha_fin,estado_cita)
        VALUES(:id_usuario, :descripcion, :hora, :fecha_ini, :fecha_fin, :estado_cita);");

        $sentencia -> bindParam(':id_usuario', $id_usu);
        $sentencia -> bindParam(':descripcion', $descripcion);
        $sentencia -> bindParam(':hora', $hora);
        $sentencia -> bindParam(':fecha_ini', $fecha_ini);
        $sentencia -> bindParam(':fecha_fin', $fecha_fin);
        $sentencia -> bindParam(':estado_cita', $estado);

    }else{
        
        $sentencia2 = $conn -> prepare("INSERT INTO usuario(DNI, nombre_usu, apellido_usu, sexo, telefono, correo )
        VALUES(:dni, :nombre, :apellido, :sexo, :telefono, :correo);");
        //
        $sentencia2 -> bindParam(':dni', $dni);
        $sentencia2 -> bindParam(':nombre', $nombre);
        $sentencia2 -> bindParam(':apellido', $apellido);
        $sentencia2 -> bindParam(':sexo', $sexo);
        $sentencia2 -> bindParam(':telefono', $telefono);
        $sentencia2 -> bindParam(':correo', $correo);
        
        if($sentencia2 -> execute()){
            $sql = $conn->query("SELECT * FROM usuario WHERE DNI = '$dni';");
            $count = $sql->rowCount();
            if($count>0){
                echo "Ya existe el numero";

                $citas = $sql->fetchAll(PDO::FETCH_OBJ);   
                foreach($citas as $cita) { $id_usu = $cita->id_usuario; }

                $fechaEntera = strtotime($fecha_ini);
                $hora = date("H", $fechaEntera);

                $sentencia = $conn -> prepare("INSERT INTO cita(id_usuario,descripcion_cita,hora,fecha_ini,fecha_fin,estado_cita)
                VALUES(:id_usuario, :descripcion, :hora, :fecha_ini, :fecha_fin, :estado_cita);");

                $sentencia -> bindParam(':id_usuario', $id_usu);
                $sentencia -> bindParam(':descripcion', $descripcion);
                $sentencia -> bindParam(':hora', $hora);
                $sentencia -> bindParam(':fecha_ini', $fecha_ini);
                $sentencia -> bindParam(':fecha_fin', $fecha_fin);
                $sentencia -> bindParam(':estado_cita', $estado);
            }
        }
        else{
            return "error";
        }
    }
    
    //$sentencia = $conn -> prepare("INSERT INTO usuario(DNI, nombre_usu, apellido_usu, sexo, telefono, correo )
    //VALUES(:dni, :nombre, :apellido, :sexo, :telefono, :correo);");
//
    //$sentencia -> bindParam(':dni', $dni);
    //$sentencia -> bindParam(':nombre', $nombre);
    //$sentencia -> bindParam(':apellido', $apellido);
    //$sentencia -> bindParam(':sexo', $sexo);
    //$sentencia -> bindParam(':telefono', $telefono);
    //$sentencia -> bindParam(':correo', $correo);
//
    if($sentencia -> execute()){
        return header("Location:cita.php");
    }
    else{
        return "error";
    }
?>