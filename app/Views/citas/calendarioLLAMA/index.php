<?php require_once('db-connect.php') ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUENTE WEB</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/fullcalendar/lib/main.min.css')?>">
    <script src="<?php echo base_url('public/js/core/jquery-3.6.0.min.js')?>"></script>
    <script src="<?php echo base_url('public/js/core/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('public/css/fullcalendar/lib/main.min.js')?>"></script>

    
    <style>
        
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>


<a href="<?php echo base_url();?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span>Volver</a>



<body class="bg-light">    
    <div class="container py-5" id="page-container">
        <div class="row">

            <div class="col-md-9">
                <div id="calendar"></div>
            </div>


            <div hidden class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Reservar cita</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">DNI</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="dni" id="title" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Descripción</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="descripcion" id="description" required></textarea>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Fecha y hora</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="fecha_ini" id="start_datetime" required>
                                </div>


                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form" id="guardar_evento"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Detalles de cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">DNI</dt>
                            <dd id="dni" class="fw-bold fs-4"></dd>

                            <dt class="text-muted">Nombre</dt>
                            <dd id="nombre" class=""></dd>

                            <dt class="text-muted">Apellido</dt>
                            <dd id="apellido" class=""></dd>

                            <dt class="text-muted">Descripción</dt>
                            <dd id="description" class=""></dd>

                            <dt class="text-muted">Hora</dt>
                            <dd id="hora" class=""></dd>

                            <dt class="text-muted">Estado</dt>
                            <dd id="estado" class=""></dd>

                            <dt class="text-muted">Inicio</dt>
                            <dd id="start" class=""></dd>
                            
                            <dt class="text-muted">Fin</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        
                        
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    
<?php 
// print_r($_POST);

$schedules = $conn->query("SELECT   id_cita, 
                                    b.id_usuario,
                                    DNI, 
                                    nombre_usu, 
                                    apellido_usu,
                                    descripcion_cita,
                                    hora,
                                    fecha_ini, 
                                    fecha_fin,
                                    estado_cita 
                            FROM  cita b INNER JOIN usuario a ON b.id_usuario = a.id_usuario where DNI='".$_POST["dni"]."'");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['fecha_ini']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['fecha_fin']));
    $sched_res[$row['id_cita']] = $row;
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="<?php echo base_url('public/js/citas.js')?>"></script>

</html>