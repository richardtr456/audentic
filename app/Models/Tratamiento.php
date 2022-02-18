<?php

namespace App\Models;

use CodeIgniter\Model;

class Tratamiento extends Model
{
    protected $table      = 'tratamiento';
    protected $primaryKey = 'id_tratamiento';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_servicio','id_usuario','id_especialidad','id_profesional','costo_inicial','tiempo','descripcion_trata'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function registrarTratamiento($data){
            return $this->insert($data);
    }

    public function obtenerUsuario($data){
        $usuario= $this->db->table('Login');
        $usuario->where($data);
        return $usuario->get()->getResultArray();
    }
    //para la lista de usuarios(admin y secretaria en el sistema)
    public function listarTratamientos() {
         $Registros = $this->db->query("SELECT a.id_tratamiento,
                                                b.nombre_servicio,
                                                b.id_servicio,c.id_usuario,f.id_profesional,
                                                CONCAT(c.nombre_usu,' ',c.apellido_usu) as nombre_usuario, 
                                                c.DNI,f.nombre,a.costo_inicial,a.descripcion_trata,a.tiempo	from 
                                                    tratamiento a INNER JOIN servicio b on a.id_servicio=b.id_servicio
                                                INNER JOIN usuario c on c.id_usuario=a.id_usuario
                                                INNER JOIN profesional f on f.id_profesional=a.id_profesional");
         return $Registros->getResult();
     }
     public function actualizar($data, $idLogin) {
         return $this->update($idLogin,$data);
     }

     public function eliminar($data) {
         return $this->delete($data);
     }

     public function obtenerTratamiento($data) {
        $Registros = $this->db->query("SELECT a.id_tratamiento,
                                        b.nombre_servicio,
                                        b.id_servicio,c.id_usuario,f.id_profesional,
                                        CONCAT(c.nombre_usu,' ',c.apellido_usu) as nombre_usuario, 
                                        c.DNI,f.nombre,a.costo_inicial,a.descripcion_trata,a.tiempo	from 
                                            tratamiento a INNER JOIN servicio b on a.id_servicio=b.id_servicio
                                        INNER JOIN usuario c on c.id_usuario=a.id_usuario
                                        INNER JOIN profesional f on f.id_profesional=a.id_profesional where a.id_tratamiento=$data");
        return $Registros->getResult();
     }
    
}

