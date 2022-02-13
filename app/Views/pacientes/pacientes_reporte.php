<?php
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename = RegistroPacientes.xls");
?>

<table  class="display table table-striped table-hover" id="users-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">DNI</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Sexo</th>
                                                <th scope="col">Teléfono</th>
                                                <th scope="col">Correo</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Editar</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($pacientes as $paciente) { ?>

                                                    <tr>
                                                        <td><?php echo $paciente->id_usuario; ?></td>
                                                        <td><?php echo $paciente->DNI; ?></td>
                                                        <td><?php echo $paciente->nombre_usu; ?></td>
                                                        <td><?php echo $paciente->apellido_usu; ?></td>
                                                        <td><?php echo $paciente->sexo; ?></td>
                                                        <td><?php echo $paciente->telefono; ?></td>
                                                        <td><?php echo $paciente->correo; ?></td>
                                                        <td><?php echo $paciente->fecha; ?></td>
                                                        <td>
                                                            <button type="button" class="editbtn btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar">
                                                                Editar
                                                            </button>
                                                        </td>
                                                    </tr>

                                            <?php }  ?>                
                                        </tbody>
</table>