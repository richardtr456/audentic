<?php

namespace App\Models;

use CodeIgniter\Model;

class Profesional extends Model
{
    protected $table      = 'profesional';
    protected $primaryKey = 'id_profesional';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cv', 'nombre','telefono'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function registrarProfesional($data){
            return $this->insert($data);
    }

    public function obtenerUsuario($data){
        $usuario= $this->db->table('Login');
        $usuario->where($data);
        return $usuario->get()->getResultArray();
    }
    //para la lista de usuarios(admin y secretaria en el sistema)
    public function listarProfesionales() {
         $Registros = $this->db->query("SELECT c.id_profesional as id_profesional,
                                                c.nombre as nombre,
                                                c.cv as cv,
                                                GROUP_CONCAT(b.nombre_esp SEPARATOR ',') as especialidades,
                                                c.telefono as telefono from esp_profesional a 
                                                INNER JOIN especialidad b 
                                                on a.id_especialidad=b.id_especialidad inner join profesional c 
                                                on c.id_profesional=a.id_profesional group by c.id_profesional
                                                order by c.id_profesional,b.nombre_esp;");
         return $Registros->getResult();
     }
     public function actualizar($data, $idLogin) {
         return $this->update($idLogin,$data);
     }

     public function eliminar($data) {
         return $this->delete($data);
     }

     public function obtenerNombre($data) {
         $Nombres =  $this->db->table('Login');
         $Nombres->where($data);
         return $Nombres->get()->getResultArray();
     }
    
}