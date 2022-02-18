<?php 
    include_once("conexion.php");

    $id = $_GET["id"];
    $estado = $_GET["estado"];
    $estado_cancel = $_GET["estado_cancel"];
    //$pendiente = "pendiente";
    //$confirmado = "confirmado";

    //echo $id;
    //echo $estado;

        
    $sentencia2 = $conn -> prepare("UPDATE cita SET estado_cita= :estcita, btn= :btn WHERE id_cita= :id;");

    if ($estado == "pendiente" AND $estado_cancel==0){
        $estado = "confirmado"; 
        $btn = "btn-warning";        
    
        $sentencia2 -> bindParam(':id', $id);
        $sentencia2 -> bindParam(':estcita', $estado);
        $sentencia2 -> bindParam(':btn', $btn);
    }
    elseif($estado == "confirmado"AND $estado_cancel==0){       
        $estado = "atendido";
        $btn = "btn-success";    
    
        $sentencia2 -> bindParam(':id', $id);
        $sentencia2 -> bindParam(':estcita', $estado);
        $sentencia2 -> bindParam(':btn', $btn);

    }

    elseif($estado == "atendido"AND $estado_cancel==0){       
        $estado = "pendiente";
        $btn = "btn-primary";    
    
        $sentencia2 -> bindParam(':id', $id);
        $sentencia2 -> bindParam(':estcita', $estado);
        $sentencia2 -> bindParam(':btn', $btn);

    }
    elseif($estado == "cancelado"){       
        $estado = "cancelado";
        $btn = "btn-dark";    
    
        $sentencia2 -> bindParam(':id', $id);
        $sentencia2 -> bindParam(':estcita', $estado);
        $sentencia2 -> bindParam(':btn', $btn);
    }

    elseif($estado_cancel==1){       
        $estado = "cancelado";
        $btn = "btn-dark";    
    
        $sentencia2 -> bindParam(':id', $id);
        $sentencia2 -> bindParam(':estcita', $estado);
        $sentencia2 -> bindParam(':btn', $btn);

    }
    

//
    //$sentencia2 = $conn -> prepare("UPDATE cita SET estado_cita= :estcita WHERE id_cita= :id;");
    //
    //
    //$sentencia2 -> bindParam(':id', $id);
    //$sentencia2 -> bindParam(':estcita', $estado);
    
//    

    if($sentencia2 -> execute()){
        $mensaje = session('mensaje');

		$data = [
					"mensaje" => $mensaje
				];
        $url="https://localhost/audentic/menu/citas";
        header('Location: '.$url);
    }
    else{
        return "error";
    }
?>